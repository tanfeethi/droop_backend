<?php

namespace Modules\AreaManagement\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\AreaManagement\Database\Seeders\InsertAreasSeeder;

class AreaManagementDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            InsertAreasSeeder::class
        ]);
    }
}
