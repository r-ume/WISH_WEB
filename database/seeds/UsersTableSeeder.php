<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder{
    public function run(){
        DB::table('users')->truncate();

        DB::table('users')->insert([
            [
                'first_name' => 'ryo',
                'last_name' => 'umeki',
                'sex' => 'male',
                'language_id' => '1',
                'image' => 'test.jpg',
                'email' => 'ryo@umeki.com',
                'password' => 'ryoumeki',
            ],
            [
                'first_name' => 'yutaro',
                'last_name' => 'kurahashi',
                'sex' => 'male',
                'language_id' => '1',
                'image' => 'test.jpg',
                'email' => 'yutaro@kurashi.com',
                'password' => 'yutarokurahashi'
            ],
            [
                'first_name' => 'mari',
                'last_name' => 'mizutani',
                'sex' => 'female',
                'language_id' => '2',
                'image' => 'test.jpg',
                'email' => 'mari@mizutani.com',
                'password' => 'marimizutani'
            ]
        ]);
    }
}