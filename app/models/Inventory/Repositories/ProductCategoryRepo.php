<?php

/**
 * Repositorio de Categorias de Productos
*/

namespace Inventory\Repositories;

use Commons\Repositories\BaseRepo;
use Inventory\Entities\ProductCategory;
use Illuminate\Support\Facades\DB;


class ProductCategoryRepo extends BaseRepo
{

    public function getModel()
    {
        return new ProductCategory();
    }

    public function newCategory()
    {
        $entity = new ProductCategory();
        return $entity;
    }

    public function totalProductsByCatID($id)
    {
        return  DB::select(DB::raw("
          SELECT count(p.id) as total FROM products p WHERE p.category_id = :category
          "),['category'=>$id])[0]->total;


    }
}