<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $categories = [
            ['name' => 'Food'],
            ['name' => 'Utilities'],
            ['name' => 'Transportation'],
            ['name' => 'Entertainment'],
            ['name' => 'Others'],
        ];

        Category::insert($categories);
    }
}
