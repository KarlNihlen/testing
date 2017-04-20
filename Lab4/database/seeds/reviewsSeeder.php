<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class reviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert([
        [
          'product_id' => 1,
          'rating' => 4,
          'comment' => "riktigt sick",
        ],
        [
          'product_id' => 2,
          'rating' => 3,
          'comment' => "decent",
        ],
        [
          'product_id' => 3,
          'rating' => 1,
          'comment' => "samst",
        ]
      ]);
    }
}
