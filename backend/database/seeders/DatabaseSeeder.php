<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(100)->create();
        echo "Seeder: Users seeded successfully\n";
        for ($i=0; $i < 500; $i++) { 
            // Only way I found to seed the database was using for
            // because table posts references itself
            \App\Models\Post::factory(1)->create();
        }
        echo "Seeder: Posts seeded successfully\n";
        \App\Models\Like::factory(5000)->create();
        echo "Seeder: Likes seeded successfully\n";
        \App\Models\Retweet::factory(5000)->create();
        echo "Seeder: Retweets seeded successfully\n";
        \App\Models\Follower::factory(5000)->create();
        echo "Seeder: Followers seeded successfully\n";

    }
}
