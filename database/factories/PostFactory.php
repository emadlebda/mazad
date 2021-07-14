<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PostFactory extends Factory
{
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word,
            'description' => '<p>' . $this->faker->text . '</p>',
            'orignal_price' => $price = rand(100, 50000),
            'price' => $price,
            'exterior_color' => $this->faker->colorName,
            'interior_color' => $this->faker->colorName,
            'city_mpg' => rand(3, 30),
            'highway_mpg' => rand(3, 30),
            'transmission' => $this->faker->randomElement(["manual", "automatic"]),
            'engine' => $this->faker->word,
            'fuel_type' => rand(1, 3),
            'status' => rand(0, 2),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'brand_id' => rand(1, 20),
            'category_id' => rand(1, 10),
        ];
    }
}
