<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Role::insert([
            'role_name' =>  'Admin'
        ]);

        Role::insert([
            'role_name' =>  'User'
        ]);

        User::insert([
            'role_id'   =>  1,
            'name'  =>  'Admin Sujon',
            'email' =>  'admin@admin.com',
            'password'  =>  Hash::make('12345678'),
        ]);

        User::insert([
            'role_id'   =>  2,
            'name'  =>  'User Sujon',
            'email' =>  'user@user.com',
            'password'  =>  Hash::make('123456789'),
        ]);

    }
}





