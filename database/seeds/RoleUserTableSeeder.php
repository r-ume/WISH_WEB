<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class RoleUserTableSeeder extends Seeder{
    public function run(){
        DB::table('role_user')->truncate();
        
        DB::table('role_user')->insert([
            [
                'user_id' => '1',
                'role_id' => '1'
            ],
            [
                'user_id' => '2',
                'role_id' => '1'
            ],
            [
                'user_id' => '3',
                'role_id' => '1'
            ],
            [
                'user_id' => '4',
                'role_id' => '1',
            ],
            [
                'user_id' => '5',
                'role_id' => '2',
            ],
            [
                'user_id' => '6',
                'role_id' => '2',
            ],
            [
                'user_id' => '7',
                'role_id' => '2',
            ],
            [
                'user_id' => '8',
                'role_id' => '2',
            ],
        ]);
    }
}