<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 5; $i++) {
            DB::table('posts')->insert([
                'name' => $faker->name, 
                'date' => $faker->date, 
                'author' => $faker->name, 
                'content' => $faker->paragraph, 
                'image' => $faker->imageUrl(800, 600, 'nature', true), 
                'created_at' => now(),  
                'updated_at' => now(),  
            ]);
        }
    }
}
