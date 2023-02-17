<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Tecnología'
        ]);

        DB::table('categories')->insert([
            'name' => 'Hogar'
        ]);

        DB::table('categories')->insert([
            'name' => 'Salud y Belleza'
        ]);
    }
}
