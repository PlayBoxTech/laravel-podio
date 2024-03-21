<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as FakerFactory;
use App\Models\User; // Assuming your User model
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = FakerFactory::create();

        for ($i = 0; $i < 50; $i++) {
            $user = User::inRandomOrder()->first(); // Get a random user for author

            $post = [
                'title' => $faker->sentence(6),
                'slug' => Str::of($faker->sentence(6))->slug('-'),
                'author_id' => $user->id,
                'body' => $faker->paragraphs(3, true),
                'published' => $faker->boolean(80), // 80% chance of being published
                'post' => true, // Set post type to true
                'mp3url' => null, // Set to null
                'mp3duration' => null, // Set to null
            ];

            Post::create($post);
        }
    }
}
