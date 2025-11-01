<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole  = Role::firstOrCreate(['name' => 'user']);

        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin',
            'password' => bcrypt('admin123'),
            'status' => 'active',
            'is_new' => false,
        ]);
        $admin->assignRole($adminRole);

        $user = User::create([
            'name' => 'Regular User',
            'email' => 'user@user',
            'password' => bcrypt('user1234'),
            'status' => 'active',
            'is_new' => false,
        ]);
        $user->assignRole($userRole);
    }
}
