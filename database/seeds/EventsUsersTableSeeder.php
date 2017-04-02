<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class EventsUsersTableSeeder extends Seeder{
    public function run(){
        DB::table('events_users')->truncate();

        DB::table('events_users')->insert([
            [
                'event_id' => 1,
                'user_id' => 1
            ],
            [
                'event_id' => 1,
                'user_id' => '2',
            ],
            [
                'event_id' => 1,
                'user_id' => 3,
            ],
            [
                'event_id' => 2,
                'user_id' => 1,
            ],
            [
                'event_id' => 2,
                'user_id' => 2,
            ],
            [
                'event_id' => 2,
                'user_id' => 1
            ]
        ]);
    }
}