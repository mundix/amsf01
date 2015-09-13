<?php

namespace Billing\Repositories;
use Billing\Entities\OrderDetail;
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


        $itbis_array                = [];
        $params                     = [];

        $is_fix_itbix               = true;

        $discount                   = 0;
        $total                      = 0;
        $total_neto                 = 0;
        $total_itbis                = 0;

        $item_discount              = 0;
        $item_discount_percent      = 0;
        $total_item_discount        = 0;

        $total_discount             = 0;
        $discount_percent           = 0;
        $discount_amount_general    = 0;
        $discount_percent_general   = 0;
        $item_discount_amount       = 0;

        $params['discount'] = $post['discount'];

        /**
         * **************************
         *  Discount Types
         *  -1 -  N/A
         *  1  -  Percent
         *  2  -  Amount
         * **************************
         */
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
        if($this->array_is_same_values($itbis_array))
            $is_fix_itbix = false;

        foreach($post['product_id'] as $key => $item_id)
        {
            $item           = Product::find($item_id);
            $item_price     = (float) $item->price;
            $item_qty       = (float) $post['qty'][$key];
            $item_total     = (float) $item_qty * $item_price;
            $itbis          = (float)$item->itbis->value;
            $itbis_array[]  = (float) $itbis;

            $product['id']         = $item_id;
            $product['price']      = $item_price;
            $product['qty']        = $item_qty;
            $product['total']      = $item_total;

            /**
             * Total Acumulado, sin imp. sin descuento
             */
            $total += $item_total;

            /**
             * Cuando no se selecciona ningun descuento grupal, como
             * por porciento y por monto, solo puede tener descuento
             * si es por el input del articulo.
            */
            if(isset($post['discount']) && $post['discount'] == -1)
            {
                /**
                 * Si el articulo individual, primero verifica si el descuento
                 * viene por el input del item, si no entonces utiliza el descuento
                 * solo si tiene para aplicar desde la DB.
                */
                /**
                 * Reset Discount Values
                 * Valor del Decuento que se le hace al producto
                */
                $item_discount = 0;
                $item_discount_percent = 0;

                if(isset($post['items_discounts'][$key]) && (float)$post['items_discounts'][$key]>0)
                {
                    $item_discount          = $item_total * (float)$post['items_discounts'][$key]/100;
                    $item_discount_percent  = (float)$post['items_discounts'][$key];

                }elseif((int)$item->discount_apply)
                {
                    $item_discount          = $item_total * (float)$item->discount/100;
                    $item_discount_percent  = (float)$item->discount;
                }

            }else{
                /**
                 * Cuando se selecciono algun tipo de Descuento
                */
                /**
                 * Descuento Porcentual
                */
                if(isset($post['discount']) && $post['discount'] == 1)
                {
                    $percent = ((float)$post['discount_total']);

                    $item_discount = 0;
                    $item_discount_percent = 0;

                    $item_discount          = $item_total * (float) $percent /100;
                    $item_discount_percent  = (float) $percent;
                }
            }

            /**
             * Producto aplicado Descuento
             */
            $item_total = $item_total - $item_discount;

            $total_item_discount            += $item_discount;
            $product['item.discount']       = $item_discount;
            $product['item.percent']        = $item_discount_percent;
            $product['item.discount.total'] = $item_total;

            /**
             * Aplica ITBIS cuando no hay descuento Grupal
             */
            $product['itbis.percent']       = $itbis;
            $itbis_total                    = $item_total * $itbis/100;
            $item_total                     = $item_total + $itbis_total;
            $product['itbis']               = $itbis_total;
            $product['item.itbis.total']    = $item_total;

            $total_itbis                    += $itbis_total;
            $total_neto                     += $item_total;

            $params['products'][] = $product;
        }

        if(isset($post['discount']) && $post['discount'] == 2 && $is_fix_itbix)
        {
            $total_neto = $total_neto - ((float)$post['discount_total']);
            $params['total.discount.amount']    = ((float)$post['discount_total']);
        }

//		$ncf 				= json_decode($this->ncfSequencyRepo->getNext(Auth::User()->location_id))[0];
//		$params['ncf'] 		= "{$ncf->ncf->prefix}{$ncf->sequency}";

        $params['total']                = $total;
        $params['total.item.discount']  = $total_item_discount;
        $params['total.itbis']           = $total_itbis;
        $params['total.neto']           = $total_neto;
        $params['client.id']	                        = $client_id;

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

        Session::push('order.products',$params);

        $this->model->save();
        if(sizeof($params['products']))
        {
            foreach($params['products'] as $product)
            {
                $od = OrderDetail::create([
                    'order_id'      => $this->model->id,
                    'product_id'    => $product["id"],
                    'qty'           => $product["qty"],
                    'price'         => $product["item.percent"],
                    'discount'      => $product['item.discount'],
                    'itbis'         => $product['itbis']
                ]);
            }
        }
        return $this->model;
    }

    private function array_is_same_values($arr = array())
    {
        $first = each($arr);
        foreach($arr as $itbis)
        {
            if($first!=$itbis)
                return FALSE;
        }
        return TRUE;
    }
}