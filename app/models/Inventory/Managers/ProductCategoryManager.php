<?php

namespace Inventory\Managers;
use Commons\Managers\BaseManager;

//Hay qye definir el metodo getrules
class ProductCategoryManager extends  BaseManager
{
    public function getRules()
    {
        $rules = [
            'name'   => 'required',
            'description'   => '',
//            'category_id'   => 'required|exists:categories,id',
            'available'     => 'in:1,0'
        ];
        return $rules;
    }

    public function prepareData($data)
    {
        if(!isset($data['available']))
            $data['available'] = 0;
        else
            $this->entity->available = 1;

        $this->entity->slug = \Str::slug($this->entity->name);
        return $data;
    }

}