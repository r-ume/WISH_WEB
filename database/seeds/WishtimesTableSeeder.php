<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class WishtimesTableSeeder extends Seeder{
        public function run(){
                DB::table('wishtimes')->truncate();

                DB::table('wishtimes')->insert([
                        [
                            'title' => 'first',
                            'content' => 'first article',
                            'image' => 'test.jpg',
                            'isApproved' => true,
                            'user_id' => '1'
                        ],
                        [
                            'title' => 'second',
                            'content' => 'second article',
                            'image' => 'test2.jpg',
                            'isApproved' => false,
                            'user_id' => '2'
                        ]
                ]);

        }
}