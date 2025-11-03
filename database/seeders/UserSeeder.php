<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

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
            'invite_code' => strtoupper(Str::random(8)),
        ]);
        $user->assignRole($userRole);

        $user2 = User::create([
            'name' => 'Regular User 2',
            'email' => 'user@user2',
            'password' => bcrypt('user1234'),
            'status' => 'active',
            'is_new' => false,
            'invite_code' => strtoupper(Str::random(8)),
        ]);
        $user2->assignRole($userRole);

        $user3 = User::create([
            'name' => 'Regular User 3',
            'email' => 'user@user3',
            'password' => bcrypt('user1234'),
            'status' => 'active',
            'is_new' => false,
            'invite_code' => strtoupper(Str::random(8)),
        ]);
        $user3->assignRole($userRole);
    }
}
