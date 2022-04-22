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
        \App\Models\Profile::factory(100)->create();
        \App\Models\Post::factory(500)->create();
        \App\Models\Like::factory(400)->create();
        \App\Models\Retweet::factory(400)->create();
        \App\Models\Bookmark::factory(400)->create();
    }
}
