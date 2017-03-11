<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CategoriesEventsTableSeeder extends Seeder{
    public function run(){
        DB::table('categories_events')->truncate();

        DB::table('categories_events')->insert([
            [
                'category_id' => '1',
                'event_id' => '2'
            ],
            [
                'category_id' => '2',
                'event_id' => '1'
            ]
        ]);
    }
}