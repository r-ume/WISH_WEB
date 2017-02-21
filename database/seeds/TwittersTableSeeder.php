<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class TwittersTableSeeder extends Seeder{
        public function run(){
                DB::table('twitters')->truncate();

                DB::table('twitters')->insert([
                        [
                                'tweet' => 'good',
                        ],
                        [
                                'tweet' => 'bad',
                        ]

                ]);
        }
}