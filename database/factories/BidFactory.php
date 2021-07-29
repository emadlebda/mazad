<?php

namespace Database\Factories;

use App\Models\Bid;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class BidFactory extends Factory
{
    protected $model = Bid::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'bid_amount' => rand(50000, 60000),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'post_id' => rand(1, 5),
            'user_id' => rand(1, 2)
        ];
    }
}
