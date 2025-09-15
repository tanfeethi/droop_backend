<?php

namespace Modules\TeamManagement\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\TeamManagement\App\Models\Team;
use Illuminate\Support\Facades\DB;

class InsertTeamSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('👥 Starting Team Seeding...');

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Team::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $teamMembers = [
            [
                'name' => ['en' => 'Ahmed Al-Rashid', 'ar' => 'أحمد الراشد'],
                'position' => ['en' => 'CEO & Founder', 'ar' => 'الرئيس التنفيذي والمؤسس'],
                'text' => ['en' => 'Visionary leader with 15+ years of experience in professional development and training.', 'ar' => 'قائد رؤيوي مع أكثر من 15 عاماً من الخبرة في التطوير المهني والتدريب.'],
                'image' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => ['en' => 'Sarah Al-Mansouri', 'ar' => 'سارة المنصوري'],
                'position' => ['en' => 'Training Director', 'ar' => 'مديرة التدريب'],
                'text' => ['en' => 'Expert in curriculum development and instructional design with international certifications.', 'ar' => 'خبيرة في تطوير المناهج والتصميم التعليمي مع شهادات دولية.'],
                'image' => 'https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => ['en' => 'Mohammed Al-Zahra', 'ar' => 'محمد الزهراء'],
                'position' => ['en' => 'Senior Trainer', 'ar' => 'مدرب أول'],
                'text' => ['en' => 'Specialized in leadership development and organizational behavior with MBA from top university.', 'ar' => 'متخصص في تطوير القيادة والسلوك التنظيمي مع ماجستير إدارة أعمال من جامعة مرموقة.'],
                'image' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => ['en' => 'Fatima Al-Sabah', 'ar' => 'فاطمة الصباح'],
                'position' => ['en' => 'Digital Skills Specialist', 'ar' => 'أخصائية المهارات الرقمية'],
                'text' => ['en' => 'Technology expert focusing on digital transformation and modern workplace skills.', 'ar' => 'خبيرة تكنولوجيا تركز على التحول الرقمي ومهارات مكان العمل الحديث.'],
                'image' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => ['en' => 'Khalid Al-Mutairi', 'ar' => 'خالد المطيري'],
                'position' => ['en' => 'Corporate Training Manager', 'ar' => 'مدير التدريب المؤسسي'],
                'text' => ['en' => 'Experienced in designing and delivering corporate training programs for Fortune 500 companies.', 'ar' => 'خبير في تصميم وتقديم برامج التدريب المؤسسي لشركات فورتشن 500.'],
                'image' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($teamMembers as $member) {
            Team::create($member);
        }

        $this->command->info('✅ Team seeding completed!');
        $this->command->info('📊 Created ' . count($teamMembers) . ' team members');
    }
}
