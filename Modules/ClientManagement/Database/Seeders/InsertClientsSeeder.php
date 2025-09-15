<?php

namespace Modules\ClientManagement\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\ClientManagement\App\Models\Client;
use Illuminate\Support\Facades\DB;

class InsertClientsSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('🏢 Starting Clients Seeding...');

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Client::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $clients = [
            [
                'logo' => 'https://images.unsplash.com/photo-1560472354-b33ff0c44a43?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                'link' => 'https://techcorp-solutions.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'logo' => 'https://images.unsplash.com/photo-1559136555-9303baea8ebd?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                'link' => 'https://innovatehub.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'logo' => 'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                'link' => 'https://globaldynamics.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'logo' => 'https://images.unsplash.com/photo-1560472354-b33ff0c44a43?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                'link' => 'https://futuretech-industries.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'logo' => 'https://images.unsplash.com/photo-1559136555-9303baea8ebd?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                'link' => 'https://smartsolutions-ltd.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'logo' => 'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                'link' => 'https://enterprise-partners.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'logo' => 'https://images.unsplash.com/photo-1560472354-b33ff0c44a43?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                'link' => 'https://digitalventures.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'logo' => 'https://images.unsplash.com/photo-1559136555-9303baea8ebd?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                'link' => 'https://nextgen-systems.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'logo' => 'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                'link' => 'https://strategic-consulting.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'logo' => 'https://images.unsplash.com/photo-1560472354-b33ff0c44a43?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                'link' => 'https://innovation-labs.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($clients as $client) {
            Client::create($client);
        }

        $this->command->info('✅ Clients seeding completed!');
        $this->command->info('📊 Created ' . count($clients) . ' clients');
    }
}

