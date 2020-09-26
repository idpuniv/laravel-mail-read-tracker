<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' =>'Admin',
            'email' =>'paulido92@gmail.com',
            'password' =>bcrypt('admin'),
            'role' => 'admin',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'remember_token' => Str::random(60),
        ]);
        User::create([
            'name' =>'User',
            'email' =>'user@yopmail.com',
            'password' =>bcrypt('user'),
            'role' => 'user',
        ]);
        User::create([
            'name' =>'idp',
            'email' =>'idpuniv@gmail.com',
            'password' =>bcrypt('idpuniv'),
            'role' => 'user',
        ]);
    }
}
