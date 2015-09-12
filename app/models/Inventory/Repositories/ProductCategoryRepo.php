<?php

/**
 * Repositorio de Categorias de Productos
*/

namespace Inventory\Repositories;

use Commons\Repositories\BaseRepo;
use Inventory\Entities\ProductCategory;

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
}