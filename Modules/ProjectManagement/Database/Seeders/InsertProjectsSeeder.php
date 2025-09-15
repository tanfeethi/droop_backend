<?php

namespace Modules\ProjectManagement\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\ProjectManagement\App\Models\Project;
use Illuminate\Support\Facades\DB;

class InsertProjectsSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('🚀 Starting Projects Seeding...');

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Project::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $projects = [
            [
                'title' => [
                    'en' => 'Digital Transformation Initiative',
                    'ar' => 'مبادرة التحول الرقمي'
                ],
                'text' => [
                    'en' => 'A comprehensive digital transformation project aimed at modernizing business processes and improving operational efficiency through technology integration.',
                    'ar' => 'مشروع تحول رقمي شامل يهدف إلى تحديث العمليات التجارية وتحسين الكفاءة التشغيلية من خلال تكامل التكنولوجيا.'
                ],
                'thumbnail' => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80',
                'tags' => [
                    'en' => ['Digital', 'Transformation', 'Technology', 'Innovation'],
                    'ar' => ['رقمي', 'تحول', 'تكنولوجيا', 'ابتكار']
                ],
                'version' => [
                    'en' => '1.0',
                    'ar' => '1.0'
                ],
                'type' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => [
                    'en' => 'Leadership Development Program',
                    'ar' => 'برنامج تطوير القيادة'
                ],
                'text' => [
                    'en' => 'An intensive leadership development program designed to cultivate essential leadership skills and prepare professionals for senior management roles.',
                    'ar' => 'برنامج تطوير قيادة مكثف مصمم لتنمية مهارات القيادة الأساسية وإعداد المحترفين للمناصب الإدارية العليا.'
                ],
                'thumbnail' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80',
                'tags' => [
                    'en' => ['Leadership', 'Management', 'Development', 'Skills'],
                    'ar' => ['قيادة', 'إدارة', 'تطوير', 'مهارات']
                ],
                'version' => [
                    'en' => '2.1',
                    'ar' => '2.1'
                ],
                'type' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => [
                    'en' => 'Corporate Training Solutions',
                    'ar' => 'حلول التدريب المؤسسي'
                ],
                'text' => [
                    'en' => 'Tailored corporate training solutions designed to enhance workforce capabilities and drive organizational performance improvement.',
                    'ar' => 'حلول تدريب مؤسسي مخصصة مصممة لتعزيز قدرات القوى العاملة ودفع تحسين الأداء التنظيمي.'
                ],
                'thumbnail' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&auto=format&fit=crop&w=2071&q=80',
                'tags' => [
                    'en' => ['Corporate', 'Training', 'Solutions', 'Performance'],
                    'ar' => ['مؤسسي', 'تدريب', 'حلول', 'أداء']
                ],
                'version' => [
                    'en' => '1.5',
                    'ar' => '1.5'
                ],
                'type' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => [
                    'en' => 'Project Management Excellence',
                    'ar' => 'التميز في إدارة المشاريع'
                ],
                'text' => [
                    'en' => 'A comprehensive project management training program focusing on best practices, methodologies, and tools for successful project delivery.',
                    'ar' => 'برنامج تدريبي شامل لإدارة المشاريع يركز على أفضل الممارسات والمنهجيات والأدوات لتسليم المشاريع بنجاح.'
                ],
                'thumbnail' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80',
                'tags' => [
                    'en' => ['Project', 'Management', 'Methodology', 'Tools'],
                    'ar' => ['مشروع', 'إدارة', 'منهجية', 'أدوات']
                ],
                'version' => [
                    'en' => '3.0',
                    'ar' => '3.0'
                ],
                'type' => 'completed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => [
                    'en' => 'Innovation & Creativity Workshop',
                    'ar' => 'ورشة الابتكار والإبداع'
                ],
                'text' => [
                    'en' => 'An interactive workshop designed to foster creative thinking and innovation capabilities within organizations.',
                    'ar' => 'ورشة تفاعلية مصممة لتعزيز التفكير الإبداعي وقدرات الابتكار داخل المنظمات.'
                ],
                'thumbnail' => 'https://images.unsplash.com/photo-1521737711867-e3b97375f902?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80',
                'tags' => [
                    'en' => ['Innovation', 'Creativity', 'Workshop', 'Thinking'],
                    'ar' => ['ابتكار', 'إبداع', 'ورشة', 'تفكير']
                ],
                'version' => [
                    'en' => '1.2',
                    'ar' => '1.2'
                ],
                'type' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => [
                    'en' => 'Data Analytics Mastery',
                    'ar' => 'إتقان تحليل البيانات'
                ],
                'text' => [
                    'en' => 'Advanced data analytics training program covering statistical analysis, data visualization, and business intelligence tools.',
                    'ar' => 'برنامج تدريبي متقدم لتحليل البيانات يغطي التحليل الإحصائي وتصور البيانات وأدوات ذكاء الأعمال.'
                ],
                'thumbnail' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80',
                'tags' => [
                    'en' => ['Data', 'Analytics', 'Statistics', 'Visualization'],
                    'ar' => ['بيانات', 'تحليل', 'إحصاء', 'تصور']
                ],
                'version' => [
                    'en' => '2.0',
                    'ar' => '2.0'
                ],
                'type' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }

        $this->command->info('✅ Projects seeding completed!');
        $this->command->info('📊 Created ' . count($projects) . ' projects');
    }
}

