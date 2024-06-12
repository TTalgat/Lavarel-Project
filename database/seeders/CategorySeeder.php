<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['name' => 'Novel'],
            ['name' => 'Religion'],
            ['name' => 'Academic'],
            ['name' => 'Children'],
            ['name' => 'General Readings'],
            ['name' => 'Wisdom'],
            ['name' => 'Self-Development'],
            // Add more categories as needed
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}