<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class productsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $randomFloat = rand(0,10)/10;
        DB::table('products')->insert([
        [
          'title' => str_random(10),
          'price' => $randomFloat,
        ],
        [
        'title' => str_random(10),
        'price' => rand(0,10)/10,
        ],
        [
          'title' => str_random(10),
          'price' => rand(0,10)/10,
        ]
    ]);
    }
}
