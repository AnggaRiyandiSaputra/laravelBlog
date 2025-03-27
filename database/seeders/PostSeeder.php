<?php

namespace Database\Seeders;

use App\Models\Posts;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 5; $i++) {
            Posts::create([
                'title' => $faker->sentence,
                'slug' => $faker->slug,
                'description' => $faker->paragraph,
                'content' => $faker->paragraphs(3, true),
                'status' => $faker->randomElement(['draft', 'published', 'archived']),
                'thumbnail' => $faker->imageUrl(),
                'user_id' => 1,
                'views' => $faker->numberBetween(0, 1000)
            ]);
        }
    }
}
