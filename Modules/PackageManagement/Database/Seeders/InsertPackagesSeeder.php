<?php

namespace Modules\PackageManagement\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\PackageManagement\App\Models\Package;
use Illuminate\Support\Facades\DB;

class InsertPackagesSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('📦 Starting Packages Seeding...');

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Package::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $packages = [
            [
                'title' => ['en' => 'Professional Development Essentials', 'ar' => 'أساسيات التطوير المهني'],
                'price_annual' => 2500.00,
                'price_monthly' => 250.00,
                'discount_annual' => 10.0,
                'discount_monthly' => 5.0,
                'active_status' => 1,
                'bordered_status' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => ['en' => 'Leadership Excellence Program', 'ar' => 'برنامج التميز في القيادة'],
                'price_annual' => 3500.00,
                'price_monthly' => 350.00,
                'discount_annual' => 15.0,
                'discount_monthly' => 8.0,
                'active_status' => 1,
                'bordered_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => ['en' => 'Digital Transformation Mastery', 'ar' => 'إتقان التحول الرقمي'],
                'price_annual' => 2800.00,
                'price_monthly' => 280.00,
                'discount_annual' => 12.0,
                'discount_monthly' => 6.0,
                'active_status' => 1,
                'bordered_status' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => ['en' => 'Corporate Training Solutions', 'ar' => 'حلول التدريب المؤسسي'],
                'price_annual' => 5000.00,
                'price_monthly' => 500.00,
                'discount_annual' => 20.0,
                'discount_monthly' => 10.0,
                'active_status' => 1,
                'bordered_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => ['en' => 'Soft Skills Development', 'ar' => 'تطوير المهارات الناعمة'],
                'price_annual' => 1800.00,
                'price_monthly' => 180.00,
                'discount_annual' => 8.0,
                'discount_monthly' => 4.0,
                'active_status' => 1,
                'bordered_status' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => ['en' => 'Project Management Professional', 'ar' => 'محترف إدارة المشاريع'],
                'price_annual' => 3200.00,
                'price_monthly' => 320.00,
                'discount_annual' => 18.0,
                'discount_monthly' => 9.0,
                'active_status' => 1,
                'bordered_status' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($packages as $package) {
            Package::create($package);
        }

        $this->command->info('✅ Packages seeding completed!');
        $this->command->info('📊 Created ' . count($packages) . ' packages');
    }
}
