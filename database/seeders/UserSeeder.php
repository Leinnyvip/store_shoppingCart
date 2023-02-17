<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run()
    {
        Role::truncate();

        $adminRole = Role::create(['name' => 'Admin']);
        $userRole = Role::create(['name' => 'User']);

        DB::table('users')->insert([
            'number_id' => '1234567890',
            'name' => 'Daniel',
            'last_name' => 'Duque',
            'email' => 'Daniel.Duque@gmail.com',
            'password' => bcrypt(123456789),
            'phone' => 1234567890,
            'address' => 'calle 40 n 12-11',
        ]);
    }
}
