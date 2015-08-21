<?php

use Faker\Factory as Faker;
use Inventory\Entities\ProductCategory;
class CategoryProductTableSeeder extends Seeder {

	public function run()
	{
        $faker = Faker::create();
        $categories = [
            'Ferretería',
            'Cocina',
            'Jardinería',
            'Oficinas',
            'Computadoras',
            'Electrodomésticos',
            'Aires Acondicionados',
            'Video Juegos',
            'Hogar',
            'Ropa',
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