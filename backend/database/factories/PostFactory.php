<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;
use App\Models\User;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'post_reference_id'=>$this->faker->numberBetween($min = 0, $max = 500),
            'user_id'=>$this->faker->numberBetween($min = 1, $max = count(User::all())),
            'content'=>$this->faker->text,
            'has_img'=>$this->faker->boolean($chanceOfGettingTrue = 20),
        ];
    }
}
