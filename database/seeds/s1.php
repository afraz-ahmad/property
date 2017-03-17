<?php

use Illuminate\Database\Seeder;

class s1 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker\Factory::create();
    	$limit=20;
    	for ($i = 0; $i<=$limit; $i++){
    		DB::table('records')->insert([
    		'phase' =>$faker->randomDigit,
    		'plot_no' =>$faker->randomDigit,
    		'block' =>$faker->randomDigit,
    		'category' => $faker->name,
    		'price' => $faker->name,
    		'army_civil' => $faker->name,
    		'contact' => $faker->phoneNumber,
    	]);
    	}
    }
}
