<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            'category_id' => 1,
            'name' => 'MacBook Pro',
            'price' => 549999,
            'description' => 'MackBook Pro',
            'stock' => 1,
            'image_path' => 'macbook-pro.png'

        ]);

        DB::table('products')->insert([
            'category_id' => 1,
            'name' => 'iPhone 11 Pro',
            'price' => 6499099,
            'description' => 'iPhone 11 Pro',
            'stock' => 3,
            'image_path' => 'iphone-11-pro.png'

        ]);

        DB::table('products')->insert([
            'category_id' => 2,
            'name' => 'Nevera Samsung',
            'price' => 1890990,
            'description' => 'nevera Samsung ',
            'stock' => 4,
            'image_path' => 'nevera.jfif'
        ]);

        DB::table('products')->insert([
            'category_id' => 3,
            'name' => 'Vitamina E',
            'price' => 68900,
            'description' => 'Multivitaminico con excelentes resultados',
            'stock' => 4,
            'image_path' => 'vitamina.jpg'
        ]);
    }
}
