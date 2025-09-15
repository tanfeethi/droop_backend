<?php

namespace Modules\TrainerManagement\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\TrainerManagement\Database\Seeders\InsertTrainerSeeder;
class TrainerManagementDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            InsertTrainerSeeder::class
        ]);
    }
}
