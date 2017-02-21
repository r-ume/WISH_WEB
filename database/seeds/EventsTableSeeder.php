<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class EventsTableSeeder extends Seeder{
        public function run(){
                DB::table('events')->truncate();

                DB::table('events')->insert([
                        [
                                'title' => 'christmas',
                                'description' => 'christmasevent'
                        ],
                        [
                                'title' => 'welcome_party',
                                'description' => 'welcome_event'
                        ]
                ]);
        }
}

