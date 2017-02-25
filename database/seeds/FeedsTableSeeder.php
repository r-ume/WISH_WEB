<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class FeedsTableSeeder extends Seeder{
    public function run(){
        DB::table('feeds')->truncate();
        
        DB::table('feeds')->insert([
            [
                'title' => 'blackout',
                'content' => 'On 2/11, all the electricity in the dorm will be off',
                'user_id' => '1'
            ],
            [
                'title' => 'RA hiring',
                'content' => 'We are hiring new RAs',
                'user_id' => '2'
            ],
        ]);
    }
}