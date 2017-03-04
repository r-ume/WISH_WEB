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
                'floor' => '5',
                'email' => 'ryo@umeki.com',
                'password' => bcrypt('ryoumeki'),
            ],
            [
                'first_name' => 'yutaro',
                'last_name' => 'kurahashi',
                'sex' => 'male',
                'language_id' => '1',
                'image' => 'test.jpg',
                'floor' => '2',
                'email' => 'yutaro@kurashi.com',
                'password' => bcrypt('yutarokurahashi')
            ],
            [
                'first_name' => 'natumi',
                'last_name' => 'higashige',
                'sex' => 'female',
                'language_id' => '2',
                'image' => 'test.jpg',
                'floor' => '8',
                'email' => 'mari@mizutani.com',
                'password' => bcrypt('marimizutani')
            ]
        ]);
    }
}