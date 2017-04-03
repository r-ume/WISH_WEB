<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class EventsTableSeeder extends Seeder{
    public function run(){
        DB::table('events')->truncate();

        DB::table('events')->insert([
            [
                'title' => 'RA会議',
                'description' => '',
                'image' => 'test.jpg',
                'start_at' => strtotime('2017-04-01'),
                'end_at' => strtotime('2017-04-01'),
                'isAllDay' => true,
                'max_people' => 4,
                'user_id' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => '5階と9階の合コン',
                'description' => '5階と9階の合コン',
                'image' => 'test.jpg',
                'start_at' => strtotime('2017-04-02'),
                'end_at' => strtotime('2017-04-02'),
                'isAllDay' => true,
                'max_people' => 5,
                'user_id' => '2',
                'created_at' => new Carbon('2017-04-04'),
                'updated_at' => new Carbon('2017-04-04')
            ],
            [
                'title' => 'BBQ',
                'description' => 'BBQ',
                'image' => 'test.jpg',
                'start_at' => strtotime('2017-04-03'),
                'end_at' => strtotime('2017-04-03'),
                'max_people' => 6,
                'isAllDay' => false,
                'user_id' => '3',
                'created_at' => new Carbon('2017-04-03'),
                'updated_at' => new Carbon('2017-04-03')
            ]
        ]);
    }
}