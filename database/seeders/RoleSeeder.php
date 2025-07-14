<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        Role::create(['name' => 'administrator']);
        Role::create(['name' => 'rider']);
        Role::create(['name' => 'cashier']);
        Role::create(['name' => 'customer']);
    }
}
