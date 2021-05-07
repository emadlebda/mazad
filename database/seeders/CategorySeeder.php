<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
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
            ],
            [
                'id' => 2,
                'title' => 'pickup Truck',
            ],
            [
                'id' => 3,
                'title' => 'sedan',
            ], [
                'id' => 4,
                'title' => 'coupe',
            ], [
                'id' => 5,
                'title' => 'crossover',
            ], [
                'id' => 6,
                'title' => 'hatchback',
            ], [
                'id' => 7,
                'title' => 'hybrid',
            ], [
                'id' => 8,
                'title' => 'convertible',
            ], [
                'id' => 9,
                'title' => 'minivan/van',
            ], [
                'id' => 10,
                'title' => 'Luxury',
            ],
        ];

        Category::insert($categories);
    }
}
