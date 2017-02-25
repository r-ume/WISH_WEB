<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CategoriesTableSeeder extends Seeder{
    public function run(){
        DB::table('categories')->truncate();
        
        DB::table('categories')->insert([
            [
                'name' => 'floor',
                'description' => 'floor events'
            ],
            [
                'name' => 'SI',
                'description' => 'SI Program'
            ]
        ]);
    }
}

