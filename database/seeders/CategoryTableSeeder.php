<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'id' => 1,
                'title' => 'SUV',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'title' => 'pickup Truck',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'title' => 'sedan',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'id' => 4,
                'title' => 'coupe',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'id' => 5,
                'title' => 'crossover',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'id' => 6,
                'title' => 'hatchback',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'id' => 7,
                'title' => 'hybrid',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'id' => 8,
                'title' => 'convertible',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'id' => 9,
                'title' => 'minivan/van',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'id' => 10,
                'title' => 'Luxury',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Category::insert($categories);
    }
}
