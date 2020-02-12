<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
        	['name' => 'administrator', 'guard_name' => 'api'],
        	['name' => 'struktural', 'guard_name' => 'api'],
        	['name' => 'fungsional_umum', 'guard_name' => 'api'],
        	['name' => 'fungsional_khusus', 'guard_name' => 'api'],
        	['name' => 'kepegawaian', 'guard_name' => 'api'],
        	['name' => 'user', 'guard_name' => 'api'],
        ]);
    }
}
