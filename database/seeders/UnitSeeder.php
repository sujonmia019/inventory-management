<?php

namespace Database\Seeders;

use App\Models\Unit;
use App\Models\User;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Unit::create([
            'name'       => 'CM',
            'created_by' => User::where('name','Admin Sujon')->first()->id
        ]);

        Unit::create([
            'name'       => 'GM',
            'created_by' => User::where('name','Admin Sujon')->first()->id
        ]);

        Unit::create([
            'name'       => 'Pcs',
            'created_by' => User::where('name','Admin Sujon')->first()->id
        ]);

        Unit::create([
            'name'       => 'Inches',
            'created_by' => User::where('name','Admin Sujon')->first()->id
        ]);
    }
}
