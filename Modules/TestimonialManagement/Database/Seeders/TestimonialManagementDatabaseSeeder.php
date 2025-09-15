<?php

namespace Modules\TestimonialManagement\Database\Seeders;

use Illuminate\Database\Seeder;

class TestimonialManagementDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            InsertTestimonialsSeeder::class
        ]);
    }
}
