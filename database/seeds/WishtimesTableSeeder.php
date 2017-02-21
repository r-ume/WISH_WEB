<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class WishtimesTableSeeder extends Seeder{
        public function run(){
                DB::table('wishtimes')->truncate();

                DB::table('wishtimes')->insert([
                        [
                                'title' => 'first',
                                'content' => 'first article'
                        ],
                        [
                                'title' => 'second',
                                'content' => 'second article'
                        ]
                ]);

        }
}