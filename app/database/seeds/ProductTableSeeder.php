<?php

use Faker\Factory as Faker;
use Inventory\Entities\Product;
class ProductTableSeeder extends Seeder {

	public function run()
	{
        $faker = Faker::create();

        foreach(range(1, 100) as $index)
        {
            $pname = $faker->word;
            Product::create([
                'name'          =>  $pname,
                'slug'          =>  \Str::slug($pname),
                'description'   =>  $faker->text(300),
                'available'     =>  1,
                'user_id'       =>  1,
                'category_id'   =>  $faker->randomElement(range(1,9)),
                'price'         =>  $faker->randomElement(range(100,10000)),
                'min_price'     =>  $faker->randomElement(range(5,10)),
                'stock'         =>  $faker->numberBetween(1,100),
                'min_stock'     =>  $faker->numberBetween(5,10),
                'sku'           =>  $faker->sha1(),

            ]);
        }


	}

}