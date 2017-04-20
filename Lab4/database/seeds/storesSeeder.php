<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class storesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stores')->insert([
        [
          'name' => str_random(10),
          'city' => str_random(10),
        ],
        [
          'name' => str_random(10),
          'city' => str_random(10),
        ],
        [
          'name' => str_random(10),
          'city' => str_random(10),
        ]
      ]);
    }
}
