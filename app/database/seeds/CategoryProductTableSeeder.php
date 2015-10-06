<?php

use Faker\Factory as Faker;
use Inventory\Entities\ProductCategory;
class CategoryProductTableSeeder extends Seeder {

	public function run()
	{
        $faker = Faker::create();
        $categories = [
            'Auto Adornos',
            'Cerrajería',
            'Deporte',
            'Eléctricos',
            'Herramientas',
            'Hogar',
            'Jardinería',
            'Maquinarias',
            'Plomeria'
        ];

        foreach($categories as $category)
        {

            ProductCategory::create([
                'name'          =>$category,
                'slug'          =>\Str::slug($category),
                'description'   => $faker->text(300),
                'available'     => 1,
            ]);
        }


	}

}