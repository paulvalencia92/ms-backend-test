<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'name' => 'Audífonos In-ear Inalámbricos Powerbank',
            'stock' => 10,
            'old_stock' => 10,
            'value' => 72000,
        ]);

        Product::create([
            'name' => 'Silla de escritorio Ergonomus Niza',
            'stock' => 5,
            'old_stock' => 5,
            'value' => 499000,
        ]);


        Product::create([
            'name' => 'Laptop Asus M515DA',
            'stock' => 12,
            'old_stock' => 12,
            'value' => 1949900,
        ]);

        Product::create([
            'name' => 'Tenis Lifestyle adidas Advantage',
            'stock' => 20,
            'old_stock' => 20,
            'value' => 214900,
        ]);
    }
}
