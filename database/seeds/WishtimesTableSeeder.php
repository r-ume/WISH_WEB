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
                            'isApproved' => 0,
                            'user_id' => '1'
                        ],
                        [
                            'title' => 'second',
                            'content' => 'second article',
                            'image' => 'test2.jpg',
                            'isApproved' => 1,
                            'user_id' => '2'
                        ],
                        [
                            'title' => 'second',
                            'content' => 'second article',
                            'image' => 'test2.jpg',
                            'isApproved' => 2,
                            'user_id' => '2'
                        ]
                
                ]);

        }
}