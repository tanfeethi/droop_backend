<?php

namespace Modules\BlogManagement\Database\Seeders;

use Illuminate\Database\Seeder;

class BlogManagementDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            InserBlogsSeeder::class
        ]);
    }
}
