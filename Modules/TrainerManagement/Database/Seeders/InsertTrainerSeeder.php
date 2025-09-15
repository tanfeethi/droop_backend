<?php

namespace Modules\TrainerManagement\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsertTrainerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        foreach (range(1, 20) as $index) {
            DB::table('trainers')->insert([
                'name' => $faker->name,
                'image' => $faker->imageUrl(300, 300, 'people'),
                'address' => $faker->address,
                'filed' => $faker->jobTitle,
                'trainee_count' => $faker->numberBetween(10, 500),
                'program_count' => $faker->numberBetween(1, 50),
                'hours_count' => $faker->numberBetween(50, 2000),
                'hours_yafee_count' => $faker->numberBetween(10, 500),
                'cv' => $faker->optional()->url,
                'linkedin' => $faker->optional()->url,
                'facebook' => $faker->optional()->url,
                'x' => $faker->optional()->url,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
