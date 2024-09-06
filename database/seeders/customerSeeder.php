<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\customer;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class customerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 1000; $i++) {
            $customer = customer::create([
                'name' => fake()->name(),
                'contact' => fake()->phoneNumber(),
            ]);

            $product = Product::create([
                'nama_product' => fake()->word(),
                'desc' => fake()->randomElement(['cetak', 'copy']),
                'category' => fake()->randomElement(['cetak digital', 'copy']),
                'price' => fake()->randomNumber(5, false),
            ]);
        }
    }
}
