<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CategoriesFeedsTableSeeder extends Seeder{
    public function run(){
        DB::table('categories_feeds')->truncate();
        
        DB::table('categories_feeds')->insert([
            [
                'category_id' => '1',
                'feed_id' => '2'
            ],
            [
                'category_id' => '2',
                'feed_id' => '1'
            ]
        ]);
    }
}

