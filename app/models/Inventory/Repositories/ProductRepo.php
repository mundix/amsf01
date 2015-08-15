<?php

/**
 *
 * Repositorio de Productos
 *
*/

namespace Inventory\Repositories;
use Commons\Repositories\BaseRepo;
use Illuminate\Support\Facades\Response;
use Inventory\Entities\Product;
use Illuminate\Support\Facades\DB;

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
        $products  = Product::with('category')->where('name','like','%'.$input.'%')->take(20)->get();
        return Response::json($products);
    }

}