<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Product::count()) {
            return;
        }

        Product::insert([
            [
                'name' => 'PS3',
                'description' => 'Game console',
                'price' => 10,
            ],
            [
                'name' => 'PS4',
                'description' => 'Game console',
                'price' => 20,
            ],
            [
                'name' => 'PS5',
                'description' => 'Game console',
                'price' => 30,
            ]
        ]);
    }
}
