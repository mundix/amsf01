<?php

namespace Inventory\Managers;
use Commons\Managers\BaseManager;

//Hay qye definir el metodo getrules
class ProductUpdateManager extends  BaseManager
{
    public function getRules()
    {
        $rules = [
            'name'          => 'required',
            'description'   => 'max:1000',
            'sku'           => '',
            'stock'         => 'numeric',
            'min_stock'     => 'numeric',
            'category_id'   => 'exists:products_categories,id',
            'price_list'    => 'numeric',
            'discount_apply'=> 'numeric',
            'discount'      => 'numeric',
            'price'         => 'required|numeric',
            'min_price'     => 'numeric',
            'available'     => 'in:1,0',
        ];
        return $rules;
    }

    public function prepareData($data)
    {
        $this->entity->price = str_replace(",","",$data['price']);
        $this->entity->min_price = str_replace(",","",$data['min_price']);

        $this->entity->slug = \Str::slug(strip_tags($data['name']));
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

        if(isset($data['available']))
            $this->entity->available = 1;
        else
            $this->entity->available = 0;

        return $data;
    }

}