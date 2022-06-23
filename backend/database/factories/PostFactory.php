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
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        //shell_exec('cls');
        return [
            'post_id'=>
                $this->rand(0,count(Post::all()))
                ,
            'user_id'=>$this->faker->numberBetween($min = 1, $max = count(User::all())),
            'content'=>$this->get_random_frase(),
            'has_img'=>$this->faker->boolean($chanceOfGettingTrue = 20),
            'created_at'=>$this->faker->unixtime(),
            'comment_number'=>0,
            'like_number'=>0,
            'retweet_number'=>0,
        ];
    }

    public function rand($min,$max){
        $random_number = rand($min,$max);
        if($random_number <= 10 && !Post::find($random_number)){
            return null;
        }
        return $random_number;
    }

    public function get_random_frase(){
        $hg = file_get_contents("https://positive-vibes-api.herokuapp.com/quotes/random");
        $json_message = json_decode($hg);
        if(!isset($json_message->data)){
            return $this->get_random_frase();
        }else{
            return json_decode($hg)->data;
        }
    }
}
