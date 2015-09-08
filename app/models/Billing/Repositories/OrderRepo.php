<?php

namespace Billing\Repositories;
use Commons\Repositories\BaseRepo;
use \Billing\Entities\Order;
use Illuminate\Support\Facades\Auth;
use \Inventory\Entities\Product;
use Commons\Repositories\ConfigRepo;
use Illuminate\Support\Facades\Session;

class OrderRepo extends BaseRepo
{
    public function getModel()
    {
        return new Order;
    }
    public function newOrder()
    {
        $entity = new Order();
        return $entity;
    }

    public function create($post,$type='sale')
    {
        $this->model->user_id = Auth::User()->id;
        $client_id = (isset($post['client_id'])&&$post['client_id']!=-1)?(int)$post['client_id']:1;

        $config = new ConfigRepo();
        $itbis_general = (float)json_decode($config->getValueByAlias('itbis'))[0]->value;

        /**
         * **************************
         *  Discount Types
         *  -1 -  N/A
         *  1  -  Percent
         *  2  -  Amount
         * **************************
         */
        $discount           = 0;
        $total              = 0;
        $total_neto         = 0;
        $total_itbis        = 0;
        $is_fix_itbix       = true;
        $itbis_array        = [];
        $params             = [];
        $item_discount      = 0;
        $total_discount     = 0;
        $discount_percent   = 0;
        $discount_amount_general = 0;
        $discount_percent_general = 0;

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
            $itbis	        = (int)$item->itbis_apply?(float)$item->fix_itbis:$itbis_general;
            $itbis_array[]  = (float) $itbis;
        }

        /**
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

        foreach($post['product_id'] as $key => $item_id)
        {
            $item           = Product::find($item_id);
            $price 	        = (float)$item->price;
            $qty   	        = (float)$post['qty'][$key];
            $item_total	    = (float)$qty *  $price;
            $item_itbis	    = $item_total*(float)$item->fix_itbis/100;
            $itbis	        = (int)$item->itbis_apply?(float)$item->fix_itbis:$itbis_general;
            $itbis_array[]  = (float) $itbis;

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

                    $item_discount_amount   = $item_total * (float)$post['items_discounts'][$key]/100;
                    $discount_percent       = $post['items_discounts'][$key];
                    $item_discount          = ($item_total - $item_discount_amount);
                    $total_discount         += $item_discount;

                }elseif((int)$item->discount_apply)
                {
                    $item_discount_amount   = $item_total * (float)$item->discount/100;
                    $discount_percent       = $item->discount;
                    $item_discount          = ($item_total - $item_discount_amount);
                    $total_discount         += $item_discount;
                }
                /**
                 * *****************************************************************
                 *   Esto es cuanod se selecciona Descuento Porcentual o por Monto
                 * *****************************************************************
                 */
            }elseif(isset($post['discount']) && $post['discount'] > -1)
            {
                if($post['discount'] == 1)
                {
                    $item_discount_amount       = $item_total * (float)$post['discount_total']/100;
                    $discount_percent_general   = $post['discount_total'];
                    $item_discount              = ($item_total - $item_discount_amount);
                    $total_discount             += $item_discount;

                }elseif($post['discount'] == 2 && !$is_fix_itbix)
                {
                    $discount_amount_general    = (float)$post['discount_total'];
                    $item_total = $item_total - (float)$post['discount_total'];
                }
            }

            /**
             *
             * calcular el itbis
             *
             */
            if($item_discount>0)
            {
                $item_itbis_value   = $itbis/100 *  $item_discount;
                $total_itbis        += $item_itbis_value;
                $item_calc_itbis    = $item_discount;

                echo "Con descuento: {$itbis} / 100 * {$item_discount_amount} = {$item_itbis_value}";
                echo "<br/>";
            }
            else{

                $item_itbis_value   = $itbis/100 *  $item_total;
                $item_calc_itbis    = $item_total;
                $total_itbis        += $item_itbis_value;

                echo "Con descuento: {$itbis} / 100 * {$item_discount_amount} = {$item_itbis_value}";
                echo "<br/>";
            }

            if(isset($post['apply_itbis']) && $post['apply_itbis'])
            {
                $item_itbis_apply   = $item_calc_itbis * (1 + $itbis/100);
                $total_neto         +=  $item_itbis_apply;
            }else{
                $item_itbis_value   = 0;
                $item_itbis_apply   = 0;
                $total_neto         +=  $item_calc_itbis;
            }

            $params['products'][] = [
                'id'                    =>$item->id,
                'item.price'            =>$item->price,
                'qty'                   =>$qty,
                'itbis'                 =>$itbis,
                'item.total'            =>$item_total,
                'item.discount.amount'  =>$item_discount_amount,
                'item.itbis.value'      =>$item_itbis_value,
                'item.itbis.apply'      =>$item_itbis_apply,
                'item.discount.percent' =>$discount_percent,
            ];
        }

//		$ncf 				= json_decode($this->ncfSequencyRepo->getNext(Auth::User()->location_id))[0];
//		$params['ncf'] 		= "{$ncf->ncf->prefix}{$ncf->sequency}";
        $params['total.discount.percent.general']	    = $discount_percent_general;
        $params['total.discount.amount.general']	    = $discount_amount_general;
        $params['total.discount']	                    = $total_discount;
        $params['total']	                            = $total;
        $params['total.neto']	                        = $total_neto;
        $params['client.id']	                        = $client_id;
        $params['itbis.total']	                        = $total_itbis;

        $this->products = $params;

        $this->model->status            = "pending";
        $this->model->type              = $type;
        $this->model->client_id         = $client_id;
        $this->model->available         = 1;
        $this->model->total             = $total;
        $this->model->sub_total         = $total_neto;
        $this->model->itbis             = $itbis_general;
        $this->model->itbis_amount      = $total_itbis;
        $this->model->discount          = $total_discount;
        $this->model->discount_percent  = $discount_percent;

//        Session::push('order.products',$params);
        echo "<pre>";
//        print_r($this->model);
        print_r($post);
        print_r($params);
//        $this->model->save();
        echo $this->model->id;
        exit();
    }
}