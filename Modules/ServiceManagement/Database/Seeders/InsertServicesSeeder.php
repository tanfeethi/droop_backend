<?php

namespace Modules\ServiceManagement\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\ServiceManagement\App\Models\Service;
use Illuminate\Support\Facades\DB;

class InsertServicesSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('🔧 Starting Services Seeding...');

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Service::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $services = [
            [
                'title' => ['en' => 'Professional Development Training', 'ar' => 'التدريب على التطوير المهني'],
                'text' => ['en' => 'Comprehensive training programs designed to enhance your professional skills and advance your career.', 'ar' => 'برامج تدريبية شاملة مصممة لتعزيز مهاراتك المهنية وتطوير مسيرتك المهنية.'],
                'icon' => 'fas fa-graduation-cap',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => ['en' => 'Leadership Development', 'ar' => 'تطوير القيادة'],
                'text' => ['en' => 'Build essential leadership skills and learn to lead teams effectively in today\'s dynamic business environment.', 'ar' => 'بناء مهارات القيادة الأساسية وتعلم قيادة الفرق بفعالية في بيئة الأعمال الديناميكية اليوم.'],
                'icon' => 'fas fa-users',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => ['en' => 'Digital Skills Training', 'ar' => 'التدريب على المهارات الرقمية'],
                'text' => ['en' => 'Master essential digital skills including data analysis, digital marketing, and technology tools.', 'ar' => 'إتقان المهارات الرقمية الأساسية بما في ذلك تحليل البيانات والتسويق الرقمي وأدوات التكنولوجيا.'],
                'icon' => 'fas fa-laptop-code',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => ['en' => 'Corporate Training Solutions', 'ar' => 'حلول التدريب المؤسسي'],
                'text' => ['en' => 'Tailored training solutions for organizations looking to develop their workforce and improve performance.', 'ar' => 'حلول تدريبية مخصصة للمؤسسات التي تسعى لتطوير قوتها العاملة وتحسين الأداء.'],
                'icon' => 'fas fa-building',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => ['en' => 'Soft Skills Development', 'ar' => 'تطوير المهارات الناعمة'],
                'text' => ['en' => 'Enhance communication, teamwork, and interpersonal skills essential for professional success.', 'ar' => 'تعزيز مهارات التواصل والعمل الجماعي والمهارات الشخصية الأساسية للنجاح المهني.'],
                'icon' => 'fas fa-handshake',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => ['en' => 'Project Management Training', 'ar' => 'التدريب على إدارة المشاريع'],
                'text' => ['en' => 'Learn project management methodologies and tools to deliver successful projects on time and within budget.', 'ar' => 'تعلم منهجيات وأدوات إدارة المشاريع لتسليم المشاريع الناجحة في الوقت المحدد وفي حدود الميزانية.'],
                'icon' => 'fas fa-project-diagram',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }

        $this->command->info('✅ Services seeding completed!');
        $this->command->info('📊 Created ' . count($services) . ' services');
    }
}
