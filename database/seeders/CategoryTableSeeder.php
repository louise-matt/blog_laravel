<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ["Historique", "Comédie", "Thriller"];
        foreach($categories as $category) {
            \App\Models\Category::factory()->create([
                'name' => $category,
            ]);
        }
    }
}
