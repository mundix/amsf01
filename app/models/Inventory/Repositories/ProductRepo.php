<?php

/**
 *
 * Repositorio de Productos
 *
*/

namespace Inventory\Repositories;
use Commons\Repositories\BaseRepo;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use Inventory\Entities\Product;

class ProductRepo extends BaseRepo
{
    public function getModel()
    {
        return new Product;
    }

    public function newProduct()
    {
        $entity = new Product();
        return $entity;
    }
    public function getTotalProducts()
    {
        $total_inventory_products = DB::table('products')
            ->select(DB::raw('count(*) as total'))
            ->get();
        return $total_inventory_products[0]->total;
    }
    public function getTotalProductsAmount()
    {
        $total_inventory_amount = DB::table('products')
            ->select(DB::raw('sum(stock * price) as total'))
            ->get();
        return $total_inventory_amount[0]->total;
    }

    public function search($input = null)
    {
//        $products = Product::where('name','like','%'.$input.'%')->take(20)->get();
        if(!is_null($input))
        {
            $products  = Product::with('category','itbis')
                ->where('name','like','%'.$input.'%')
                ->where('stock','>',0)
                ->orWhere('id','=',$input)
                ->orWhere('description','like','%'.$input.'%')
                ->orWhere('sku','like','%'.$input.'%')
                ->take(20)
                ->get();
            return Response::json($products);
        }
        return FALSE;
    }

}