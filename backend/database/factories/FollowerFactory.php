<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Follower>
 */
class FollowerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'follower_id' => $this->faker->numberBetween($min = 1, $max = count(User::all())),
            'followed_id' => $this->faker->numberBetween($min = 1, $max = count(User::all())),
            'created_at'=>$this->faker->unixtime(),
        ];
    }
}
