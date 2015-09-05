<?php
/**
 * A010010011400000001
*/
namespace Inventory\Managers;

use Commons\Managers\BaseManager;
use HireMe\Entities\User;
use \Inventory\Entities\Product;
use Commons\Repositories\ConfigRepo;


class SalesManager extends  BaseManager
{
    public function getRules()
    {
        $rules = [
            'product_id'        => 'required',
            'items_discounts'   => '',
            'discount_total'       => '',
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
        /**
         * *********************************************
         * RESUME
         * *********************************************
         * Array
            (
            [product_id] => Array
            (
            [0] => 10
            [1] => 1
            [2] => 5
            )

            [qty] => Array
            (
            [0] => 1
            [1] => 1
            [2] => 1
            )

            [apply_itbis] => 1
            [apply_ncf] => 1
            [discount] => 1
            [discount_total] => 50
            [rnc] => 131080146
            )
        */
        echo "<pre>";
//        print_r($post);
        /**
         * Discount Types
         * -1 -  N/A
         * 1  - Percent
         * 2  - Amount
         */
        $discount           = 0;
        $total              = 0;
        $total_neto         = 0;
        $is_fix_itbix       = true;
        $itbis_array        = [];
        $total_fix_itbis    = 0;
        $params             = [];
        $item_discount      = 0;
        $total_discount     = 0;

        $params['discount'] = $post['discount'];
        if(isset($post['discount']) && $post['discount'] > -1)
        {
            if($post['discount'] == 1)
            {
                $discount = ((float)$post['discount_total'])/100;
            }elseif($post['discount'] == 2)
            {
                $discount = (float)$post['discount_total'];
            }
            $params['discount_value'] = $discount;
        }

        /**
         * #1
         * *****************************************************
         * Reach Product Array
         * *****************************************************
        */
        foreach($post['product_id'] as $key => $item_id)
        {
            $item           = Product::find($item_id);
            $price 	        = (float)$item->price;
            $qty   	        = (float)$post['qty'][$key];
            $item_total	    = (float)$qty *  $price;
            $item_itbis	    = $item_total*(float)$item->fix_itbis/100;
            $itbis	        = $item->fix_itbis>0?(float)$item->fix_itbis/100:(float)ConfigRepo::getValueByAlias('itbis')/100;

            $itbis_array[]  = (float) $item->fix_itbis;

            $total += $item_total;

            /**
             * ********************************************************
             * Descuento #1, descuento por DB, y discount option = -1 (No Aplica)
             * Aplicando los descuentos
             * ********************************************************
            */
            if(isset($post['discount']) && $post['discount'] == -1)
            {
                /**
                 * Si el campo de descuento por item individual es mayor a cero, aplica
                 * el descuento, Si no se cumple esta condicion, entonces, debo verificar,
                 * si el campo discount_apply es 1, y de ser asi debo aplicar el descuento
                 * con el valor que viene desde la DB.
                */
                if(isset($post['items_discounts'][$key]) && (float)$post['items_discounts'][$key]>0)
                {

                    $item_discount_amount   = $item_total * (float)$post['items_discounts'][$key]/100;;
                    $item_discount          = ($item_total - $item_discount_amount);
                    $total_discount         += $item_discount;

                }elseif((int)$item->discount_apply)
                {
                    $item_discount_amount   = $item_total * (float)$item->discount/100;
                    $item_discount          = ($item_total - $item_discount_amount);
                    $total_discount         += $item_discount;
                }
            /**
             * ********************************************************
             * Esto es cuanod se selecciona Descuento Porcentual o por Monto
             * ********************************************************
            */
            }elseif(isset($post['discount']) && $post['discount'] > -1)
            {

            }

            /**
             * Esto solo se aplica cuando el descuento es diferente, y
             * la opcion de descuento es -1
            */
            if(isset($post['discount']) && $post['discount']==-1)
            {
                $total_neto += ($item_itbis + $item_total);
            }
            else{
                $total_neto += $item_total;
            }
            /**
             * calcular el itbis
             */
            if($item_discount>0)
            {
                $item_calc_itbis = $item_discount;
            }
            else{
                $item_calc_itbis = $item_total;
            }
            $item_calculado_itebis = $item_calc_itbis * (1+$item_itbis);


            $params['products'][] = [
                'id'                    =>$item->id,
                'item.price'            =>$item->price,
                'qty'                   =>$qty,
                'item.total'            =>$item_total,
                'item.discount.amount'  =>$item_discount_amount,
                'item.discount'         =>$item_discount,
                'item.discount.total'   =>$total_discount,
                'item.itbis'            =>$item_calculado_itebis,

            ];
        }

        /**
         * #2
         * ********************************************************
         * Verify if the itbis is different of the general ITBIS
         * and all the fix itbis are different
         * ********************************************************
        */
        foreach($itbis_array as $key => $fix_itbis)
        {
            if(isset($itbis_array[$key+1]) && $fix_itbis != $itbis_array[$key+1] || $itbis_array[sizeof($itbis_array)-1] != $fix_itbis)
            {
                $is_fix_itbix = true;
            }
        }
//        $params['is_fix_itbis'] = $is_fix_itbix;
//        $params['total_fix_itbis'] = $total_fix_itbis;
        if($is_fix_itbix)
        {

        }
        /**
         * #3
         * ********************************************************
         * Apply Discount by Discoint Select Option
         * it fix_itbis can apply ammount discount
         * ********************************************************
        */
//        $params['discount_option'] = $post['discount'];
//        if(isset($post['discount']) && $post['discount'] > -1)
//        {
//            $params['discount'] = $post['discount'];
//            /**
//             * Percentual Discount
//            */
//            if($post['discount'] == 1 && !$is_fix_itbix)
//            {
//                $params['discount'] = "Percentual";
//            /**
//             * Ammount Discount
//            */
//            }elseif($post['discount'] ==2 && !$is_fix_itbix)
//            {
//                $params['discount'] = "Ammount";
//            }
//        }

//		$ncf 				= json_decode($this->ncfSequencyRepo->getNext(Auth::User()->location_id))[0];
//		$params['ncf'] 		= "{$ncf->ncf->prefix}{$ncf->sequency}";
        $params['total.discount']	    = $total_discount;
        $params['total']	            = $total;
        $params['total.neto']	        = $total_neto;
//        $params['total_itbis']	= $total_;

        print_r($params);
        exit();

    }

}