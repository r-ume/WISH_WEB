<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class LanguagesTableSeeder extends Seeder{
    public function run(){
        DB::table('languages')->truncate();
        
        DB::table('languages')->insert([
            [
                'language' => 'Japanese',
            ],
            [
                'language' => 'English',
            ],
            [
                'language' => 'Chinese',
            ],
            [
                'language' => 'Korean'
            ]
        ]);
    }
}