<?php

namespace Inventory\Managers;

use Commons\Managers\BaseManager;
use HireMe\Entities\User;
use \Inventory\Entities\Product;

class OrdersDetailsManager extends  BaseManager
{
    public function getRules()
    {
        $rules = [
            'product_id'          => 'required',
            'qty'                 => 'required',
        ];
        return $rules;
    }

    public function prepareData($post)
    {
        print_r($post);
        /**
         * Discount Types
         * -1 -  N/A
         * 1  - Percent
         * 2  - Amount
         */
        $discount = 0;
        $total = 0;
        $sub_total = 0;

        if(isset($post['discount']) && $post['discount'] > -1)
        {
            if($post['discount'] == 1)
            {
                $discount = ((float)$post['discount_total'])/100;
            }elseif($post['discount'] == 2)
            {
                $discount = (float)$post['discount_total'];
            }
            $params['discount'] = $discount;
        }

        foreach($post['product_id'] as $key => $item_id)
        {
//			echo "$key => $item_id";
            $p = Product::find($item_id);
            $price 	= (float)$p->price;
            $qty   	= (float)$post['qty'][$key];
            $p_total	= $qty *  $price;
            $total += $p_total;
            $params['products'][] = ['id'=>$p->id,'price'=>$p->price,'qty'=>$qty,'total'=>$p_total];
            echo "<br/>";
        }
//		$ncf 				= json_decode($this->ncfSequencyRepo->getNext(Auth::User()->location_id))[0];
//		$params['ncf'] 		= "{$ncf->ncf->prefix}{$ncf->sequency}";
        $params['total']	= $total;

        print_r($params);
        exit();

    }

}