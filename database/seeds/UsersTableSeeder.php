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
                'image' => 'uploads/RAs/ryo.jpg',
                'floor' => '5',
                'email' => 'ryo@umeki.com',
                'password' => bcrypt('ryoumeki'),
            ],
            [
                'first_name' => 'cheryon',
                'last_name'  => 'park',
                'sex' => 'female',
                'language_id' => '4',
                'image' => 'uploads/RAs/cheryon.jpg',
                'floor' => 5,
                'email' => 'cheryon@park.com',
                'password' => bcrypt('cheryon'),
            ],
            [
                'first_name' => 'yutaro',
                'last_name' => 'kurahashi',
                'sex' => 'male',
                'language_id' => '1',
                'image' => 'uploads/RAs/yutaro.jpg',
                'floor' => '2',
                'email' => 'yutaro@kurashi.com',
                'password' => bcrypt('yutarokurahashi')
            ],
            [
                'first_name' => 'mari',
                'last_name' => 'mizutani',
                'sex' => 'female',
                'language_id' => '2',
                'image' => 'uploads/RAs/mari.jpg',
                'floor' => '8',
                'email' => 'mari@mizutani.com',
                'password' => bcrypt('marimizutani')
            ],
            [
                'first_name' => '吉田',
                'last_name' => 'こうへい',
                'sex' => 'male',
                'language_id' => '1',
                'image' => 'uploads/RAs/kouhei.jpg',
                'floor' => '5',
                'email' => 'yoshida@kouhei.com',
                'password' => bcrypt('yoshidakouhei')
            ],
            [
                'first_name' => 'mizyu',
                'last_name' => 'unknown',
                'sex' => 'female',
                'language_id' => '3',
                'image' => 'uploads/RAs/mizyu.jpg',
                'floor' => '10',
                'email' => 'mizyu@unknown.com',
                'password' => bcrypt('mizyuunknown')
            ],
            [
                'first_name' => 'taichi',
                'last_name' => 'murase',
                'sex' => 'male',
                'language_id' => '2',
                'image' => 'uploads/RAs/taichi.jpg',
                'floor' => '7',
                'email' => 'taichi@murase.com',
                'password' => bcrypt('taichimurase')
            ],
            [
                'first_name' => 'michel',
                'last_name' => 'unknown',
                'sex' => 'male',
                'language_id' => '1',
                'image' => 'uploads/RAs/michel.jpg',
                'floor' => '3',
                'email' => 'michel@unknown.com',
                'password' => bcrypt('michelunknown')
            ]
        ]);
    }
}