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
            ],
            [
                'id' => 2,
                'title' => 'BMW',
            ],
            [
                'id' => 3,
                'title' => 'VW',
            ], [
                'id' => 4,
                'title' => 'Alfa Romeo',
            ], [
                'id' => 5,
                'title' => 'Aston Martin',
            ], [
                'id' => 6,
                'title' => 'Bentley',
            ],
            [
                'id' => 7,
                'title' => 'Cadillac',
            ],
            [
                'id' => 8,
                'title' => 'Chevrolet',
            ], [
                'id' => 9,
                'title' => 'Dodge',
            ], [
                'id' => 10,
                'title' => 'Ferrari',
            ], [
                'id' => 11,
                'title' => 'FIAT',
            ],
            [
                'id' => 12,
                'title' => 'Ford',
            ],
            [
                'id' => 13,
                'title' => 'GMC',
            ], [
                'id' => 14,
                'title' => 'Honda',
            ], [
                'id' => 15,
                'title' => 'Hyundai',
            ], [
                'id' => 16,
                'title' => 'Jaguar',
            ],
            [
                'id' => 17,
                'title' => 'Jeep',
            ],
            [
                'id' => 18,
                'title' => 'KIA',
            ], [
                'id' => 19,
                'title' => 'Maserati',
            ], [
                'id' => 20,
                'title' => 'Mazda',
            ],
        ];

        Brand::insert($brands);
    }
}
