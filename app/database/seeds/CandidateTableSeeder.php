<?php

use HireMe\Entities\User;
use HireMe\Entities\Candidate;
use Faker\Factory as Faker;

class CandidateTableSeeder extends Seeder {

	public function run()
	{
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        DB::table('candidates')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
//        return;
		$faker = Faker::create();

        $user = User::create([
            'full_name' => 'Clemente Pichardo',
            'email'     => 'ce.pichardo@gmail.com',
            'password'  => \Hash::make(12345),
            'location_id'  => 1,
            'type'      => 'admin'
        ]);

        Candidate::create([
            "id"            => $user->id,
            "website_url"   => $faker->url,
            "description"   => $faker->text(200),
            "category_id"   => $faker->randomElement([1,2,3]),
            "available"     => true,
            "slug"          => \Str::slug('Clemente Pichardo')
        ]);

		foreach(range(2, 9) as $index)
		{
            $fullName = $faker->name;
			$user = User::create([
                'id'        => $index,
                'full_name' => $fullName,
                'email'     => $faker->email,
                'password'  => \Hash::make(12345),
                "location_id"     => $faker->randomElement([1,2,3]),
                'type'      => 'candidate',//Esto era user_type en CreateUsersTable Migration
			]);
            Candidate::create([
                "id"            => $user->id,
                "website_url"   => $faker->url,
                "description"   => $faker->text(200),
                "category_id"   => $faker->randomElement([1,2,3]),
                "available"     => true,
                "slug"          => \Str::slug($fullName),
            ]);
		}

    }

}