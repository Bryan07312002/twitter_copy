<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Profile;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    protected $model = Profile::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween($min = 1, $max = count(User::all())),
            'description' => $this->faker->text,
            'link' => $this->faker->url,
            'birth_date' => $this->faker->dateTime(),
            'profile_photo_path' => $this->faker->imageUrl($with=640, $height=480, 'cats'),
            'profile_banner_path' => $this->faker->imageUrl($with=1920, $height=480, 'cats')
        ];
    }
}
