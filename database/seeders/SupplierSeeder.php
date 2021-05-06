<?php

namespace Database\Seeders;

use App\Models\Supplier;
use App\Models\User;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Supplier::create([
            'name'       => 'Md.Rafi',
            'mobile'     => '01872339806',
            'email'      => 'supplier1@gmail.com',
            'address'    => 'Bogura',
            'created_by' => User::where('name','Admin Sujon')->first()->id
        ]);

        Supplier::create([
            'name'       => 'Md.Raju',
            'mobile'     => '01872339807',
            'email'      => 'supplier2@gmail.com',
            'address'    => 'Subgram',
            'created_by' => User::where('name','Admin Sujon')->first()->id
        ]);

        Supplier::create([
            'name'       => 'Md.Robiul',
            'mobile'     => '01872339808',
            'email'      => 'supplier3@gmail.com',
            'address'    => 'Naruli',
            'created_by' => User::where('name','Admin Sujon')->first()->id
        ]);
    }
}
