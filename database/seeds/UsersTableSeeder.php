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
                                'email' => 'ryo@umeki.com',
                                'password' => 'ryoumeki',
                        ],
                        [
                                'first_name' => 'yutaro',
                                'last_name' => 'kurahashi',
                                'sex' => 'male',
                                'email' => 'yutaro@kurashi.com',
                                'password' => 'yutarokurahashi'
                        ],
                        [
                                'first_name' => 'mari',
                                'last_name' => 'mizutani',
                                'sex' => 'female',
                                'email' => 'mari@mizutani.com',
                                'password' => 'marimizutani'
                        ]

                ]);
        }
}