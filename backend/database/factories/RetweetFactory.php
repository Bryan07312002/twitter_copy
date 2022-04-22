<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;
use App\Models\User;
use App\Models\Retweet;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Retweet>
 */
class RetweetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'post_id' => $this->faker->numberBetween($min = 0, $max = 500),
            'user_id' => $this->faker->numberBetween($min = 1, $max = count(User::all())),
        ];
    }
}
