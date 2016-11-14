<?php

use Illuminate\Database\Seeder;

class CateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cates')->insert([
        	'name' => str_random(10),
        	'desc' => str_random(10)
        ]);
        DB::table('cates')->insert([
        	'name' => str_random(10),
        	'desc' => str_random(10)
        ]);
        DB::table('cates')->insert([
        	'name' => str_random(10),
        	'desc' => str_random(10)
        ]);
    }
}
