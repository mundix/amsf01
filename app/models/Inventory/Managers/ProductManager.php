<?php

namespace Inventory\Managers;
use Commons\Managers\BaseManager;

//Hay qye definir el metodo getrules
class ProductManager extends  BaseManager
{
    public function getRules()
    {
        $rules = [
            'name'          => 'required',
            'description'   => 'required|max:1000',
            'sku'           => '',
            'stock'         => 'numeric',
            'min_stock'     => 'numeric',
            'category_id'   => 'exists:products_categories,id',
            'price_list'    => 'numeric',
            'price'         => 'required|numeric',
            'discount_apply'=> 'numeric',
            'discount'      => 'numeric',
            'min_price'     => 'numeric',
            'itbis_id'      => 'exists:itbis,id',
            'available'     => 'in:1,0',
        ];
        return $rules;
    }

    public function prepareData($data)
    {

        $this->entity->price = str_replace(",","",$data['price']);
        $this->entity->min_price = str_replace(",","",$data['min_price']);

        $this->entity->slug = \Str::slug(strip_tags($data['name']));
        $this->entity->user_id = \Auth::user()->id;
        $this->entity->description = strip_tags($data['description']);

        if(isset($data['discount_apply']))
            $this->entity->discount_apply = 1;
        else
            $this->entity->discount_apply = 0;

        if(isset($data['discount']))
            $this->entity->discount = strip_tags($data['discount']);
        else
            $this->entity->discount = 0;

        $this->entity->name = strip_tags($data['name']);
        $this->entity->available = 1;

        return $data;
    }

}