<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class RolesTableSeeder extends Seeder{
    public function run(){
        DB::table('roles')->truncate();
        
        DB::table('roles')->insert([
            [
                'role' => 'RA'
            ],
            [
                'role' => 'resident'
            ]
        ]);
    }
}

