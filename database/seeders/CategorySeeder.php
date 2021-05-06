<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name'       => 'Mobile',
            'created_by' => User::where('name','Admin Sujon')->first()->id
        ]);

        Category::create([
            'name'       => 'Freeze',
            'created_by' => User::where('name','Admin Sujon')->first()->id
        ]);

        Category::create([
            'name'       => 'Laptop',
            'created_by' => User::where('name','Admin Sujon')->first()->id
        ]);

        Category::create([
            'name'       => 'Monitor',
            'created_by' => User::where('name','Admin Sujon')->first()->id
        ]);
    }
}
