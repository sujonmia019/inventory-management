<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::create([
            'name'    => 'Md.Rafi',
            'mobile'  => '01872339806',
            'email'   => 'customer1@gmail.com',
            'address' => 'Bogura',
            'created_by' => User::where('name','Admin Sujon')->first()->id
        ]);

        Customer::create([
            'name'    => 'Md.Raju',
            'mobile'  => '01872339807',
            'email'   => 'customer2@gmail.com',
            'address' => 'Subgram',
            'created_by' => User::where('name','Admin Sujon')->first()->id
        ]);

        Customer::create([
            'name'    => 'Md.Robiul',
            'mobile'  => '01872339808',
            'email'   => 'customer3@gmail.com',
            'address' => 'Naruli',
            'created_by' => User::where('name','Admin Sujon')->first()->id
        ]);
    }
}
