<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = [
            [
                'id' => 1,
                'title' => 'Mercedes-Benz',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'title' => 'BMW',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'title' => 'VW',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'id' => 4,
                'title' => 'Alfa Romeo',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'id' => 5,
                'title' => 'Aston Martin',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'id' => 6,
                'title' => 'Bentley',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'title' => 'Cadillac',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'title' => 'Chevrolet',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'id' => 9,
                'title' => 'Dodge',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'id' => 10,
                'title' => 'Ferrari',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'id' => 11,
                'title' => 'FIAT',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 12,
                'title' => 'Ford',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 13,
                'title' => 'GMC',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'id' => 14,
                'title' => 'Honda',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'id' => 15,
                'title' => 'Hyundai',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'id' => 16,
                'title' => 'Jaguar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 17,
                'title' => 'Jeep',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 18,
                'title' => 'KIA',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'id' => 19,
                'title' => 'Maserati',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'id' => 20,
                'title' => 'Mazda',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Brand::insert($brands);
    }
}
