<?php

namespace Modules\BlogManagement\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\BlogManagement\App\Models\Blog;
use Illuminate\Support\Facades\DB;

class InserBlogsSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('📝 Starting Blog Seeding...');

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Blog::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $blogs = [
            [
                'title' => ['en' => 'The Future of Professional Development', 'ar' => 'مستقبل التطوير المهني'],
                'text' => ['en' => 'Professional development is evolving rapidly with new technologies and methodologies. Learn how to stay ahead in your career.', 'ar' => 'التطوير المهني يتطور بسرعة مع التقنيات والمنهجيات الجديدة. تعلم كيف تبقى متقدماً في مسيرتك المهنية.'],
                'background' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&auto=format&fit=crop&w=2071&q=80',
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => ['en' => 'Building Effective Teams', 'ar' => 'بناء الفرق الفعالة'],
                'text' => ['en' => 'Discover the key principles of building and managing high-performing teams in today\'s dynamic workplace.', 'ar' => 'اكتشف المبادئ الأساسية لبناء وإدارة الفرق عالية الأداء في مكان العمل الديناميكي اليوم.'],
                'background' => 'https://images.unsplash.com/photo-1521737711867-e3b97375f902?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80',
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => ['en' => 'Digital Transformation in Training', 'ar' => 'التحول الرقمي في التدريب'],
                'text' => ['en' => 'Explore how digital transformation is revolutionizing the training and education industry.', 'ar' => 'استكشف كيف يثور التحول الرقمي في صناعة التدريب والتعليم.'],
                'background' => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80',
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => ['en' => 'Leadership Skills for the Modern Era', 'ar' => 'مهارات القيادة للعصر الحديث'],
                'text' => ['en' => 'Essential leadership skills that every modern professional needs to develop for success.', 'ar' => 'مهارات القيادة الأساسية التي يحتاج كل محترف حديث لتطويرها للنجاح.'],
                'background' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80',
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => ['en' => 'Innovation in Corporate Training', 'ar' => 'الابتكار في التدريب المؤسسي'],
                'text' => ['en' => 'How innovative approaches to corporate training are driving business success and employee engagement.', 'ar' => 'كيف تقود الأساليب المبتكرة للتدريب المؤسسي نجاح الأعمال ومشاركة الموظفين.'],
                'background' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80',
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($blogs as $blog) {
            Blog::create($blog);
        }

        $this->command->info('✅ Blog seeding completed!');
        $this->command->info('📊 Created ' . count($blogs) . ' blogs');
    }
}