<?php

use App\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
        	'username' => 'admin',
        	'password' => bcrypt('admin'),
            'e_password' => null,
            'api_token' => Str::random(60),
        ]);

        $user->assignRole('administrator');
    }
}
