<?php
/**
 * A010010011400000001
*/
namespace Inventory\Managers;

use Commons\Managers\BaseManager;


class SalesManager extends  BaseManager
{
    public $products;

    public function getRules()
    {
        $rules = [
            'product_id'        => 'array',
            'items_discounts'   => '',
            'discount_total'    => '',
            'apply_itbis'       => '',
            'apply_ncf'         => '',
            'discount'          => '',
            'rnc'               => '',
            'qty'               => 'required',
        ];
        return $rules;
    }

    public function prepareData($post)
    {
//        echo "<pre>";

//        print_r($this->entity);
//        exit();

    }

}