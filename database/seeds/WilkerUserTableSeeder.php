<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WilkerUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('wilker_users')->insert([

        	[
        		'user_id' => 1,
        		'wilker_id' => 1
        	],

        ]);
    }
}
