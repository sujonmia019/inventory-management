<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'supplier_id' => 1,
            'unit_id'     => 3,
            'category_id' => 1,
            'name'        => 'sumsung a model mobile',
            'quantity'    => 0,
            'status'      => true,
            'created_by'  => User::where('name','Admin Sujon')->first()->id
        ]);

        Product::create([
            'supplier_id' => 2,
            'unit_id'     => 1,
            'category_id' => 2,
            'name'        => 'LG a model high configuation',
            'quantity'    => 0,
            'status'      => true,
            'created_by'  => User::where('name','Admin Sujon')->first()->id
        ]);

        Product::create([
            'supplier_id' => 3,
            'unit_id'     => 3,
            'category_id' => 3,
            'name'        => 'HP a model nice laptop',
            'quantity'    => 0,
            'status'      => true,
            'created_by'  => User::where('name','Admin Sujon')->first()->id
        ]);
    }
}
