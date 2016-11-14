<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('products')->insert([
    		'name' => str_random(10),
    		'desc' => str_random(20),
    		'price' => rand(10,100),
    		'cate_id' => rand(1,9)
    	]);
    	DB::table('products')->insert([
    		'name' => str_random(10),
    		'desc' => str_random(20),
    		'price' => rand(10,100),
    		'cate_id' => rand(1,3)
    	]);
    	DB::table('products')->insert([
    		'name' => str_random(10),
    		'desc' => str_random(20),
    		'price' => rand(10,100),
    		'cate_id' => rand(1,3)
    	]);
    }
}
