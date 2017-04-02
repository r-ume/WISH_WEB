<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CategoriesWistimesTableSeeder extends Seeder{
    public function run(){
        DB::table('categories_wishtimes')->truncate();

        DB::table('categories_wishtimes')->insert([
            [
                'category_id' => 1,
                'wishtimes_id' => 2
            ],
            [
                'category_id' => 2,
                'wishtimes_id' => 1
            ]
        ]);
    }
}