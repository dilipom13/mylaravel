<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email','dilipom13@gmail.com')->first();

        if(!$user){
        	User::create([
        		'name'  => 'Dilip Modhavadiya',
        		'email' => 'dilipom13@gmail.com',
        		'role'  => 'super-admin',
        		'password' =>  Hash::make('password'),
        	]);
        }
    }
}
