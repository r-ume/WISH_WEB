<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class TweetsTableSeeder extends Seeder{
    public function run(){
        DB::table('tweets')->truncate();

        DB::table('tweets')->insert([
            [
                'tweet' => 'good',
                'user_id' => '1'
            ],
            [
                'tweet' => 'bad',
                'user_id' => '2'
            ]
        ]);
    }
}