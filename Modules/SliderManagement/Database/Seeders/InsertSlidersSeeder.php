<?php

namespace Modules\SliderManagement\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\SliderManagement\App\Models\Slider;
use Illuminate\Support\Facades\DB;

class InsertSlidersSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('🎠 Starting Sliders Seeding...');

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Slider::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $sliders = [
            [
                'title' => [
                    'en' => 'Professional Training Programs',
                    'ar' => 'برامج التدريب المهنية'
                ],
                'text' => [
                    'en' => 'Comprehensive training programs designed to enhance your professional skills and advance your career.',
                    'ar' => 'برامج تدريبية شاملة مصممة لتعزيز مهاراتك المهنية وتطوير مسيرتك المهنية.'
                ],
                'background' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&auto=format&fit=crop&w=2071&q=80',
                'type' => 'program',
                'order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => [
                    'en' => 'Expert Instructors',
                    'ar' => 'مدربون خبراء'
                ],
                'text' => [
                    'en' => 'Learn from industry veterans with years of experience and proven track records.',
                    'ar' => 'تعلم من خبراء الصناعة ذوي سنوات من الخبرة والسجلات المثبتة.'
                ],
                'background' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80',
                'type' => 'program',
                'order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => [
                    'en' => 'Success Stories',
                    'ar' => 'قصص النجاح'
                ],
                'text' => [
                    'en' => 'Join thousands of successful professionals who have transformed their careers with our programs.',
                    'ar' => 'انضم إلى آلاف المحترفين الناجحين الذين غيروا مسيرتهم المهنية ببرامجنا.'
                ],
                'background' => 'https://images.unsplash.com/photo-1521737711867-e3b97375f902?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80',
                'type' => 'program',
                'order' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => [
                    'en' => 'Industry Certifications',
                    'ar' => 'الشهادات المهنية'
                ],
                'text' => [
                    'en' => 'Earn recognized certifications that boost your credibility and career prospects.',
                    'ar' => 'احصل على شهادات معترف بها تعزز مصداقيتك وآفاقك المهنية.'
                ],
                'background' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80',
                'type' => 'program',
                'order' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => [
                    'en' => 'Flexible Learning Options',
                    'ar' => 'خيارات تعلم مرنة'
                ],
                'text' => [
                    'en' => 'Choose from online, in-person, or hybrid learning options that fit your schedule.',
                    'ar' => 'اختر من خيارات التعلم عبر الإنترنت أو الشخصي أو المختلط التي تناسب جدولك.'
                ],
                'background' => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80',
                'type' => 'program',
                'order' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => [
                    'en' => 'Welcome to Durub Almustaqbal',
                    'ar' => 'مرحباً بكم في دروب المستقبل'
                ],
                'text' => [
                    'en' => 'Your gateway to professional excellence and career advancement through world-class training programs.',
                    'ar' => 'بوابتك للتميز المهني والتقدم الوظيفي من خلال برامج تدريبية عالمية المستوى.'
                ],
                'background' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&auto=format&fit=crop&w=2071&q=80',
                'type' => 'hero',
                'order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => [
                    'en' => 'Transform Your Career',
                    'ar' => 'غيّر مسيرتك المهنية'
                ],
                'text' => [
                    'en' => 'Join our comprehensive training programs and unlock your potential for success.',
                    'ar' => 'انضم إلى برامجنا التدريبية الشاملة واكتشف إمكاناتك للنجاح.'
                ],
                'background' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80',
                'type' => 'hero',
                'order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => [
                    'en' => 'Excellence in Training',
                    'ar' => 'التميز في التدريب'
                ],
                'text' => [
                    'en' => 'Experience world-class training with industry experts and cutting-edge methodologies.',
                    'ar' => 'استمتع بتدريب عالمي المستوى مع خبراء الصناعة ومنهجيات متطورة.'
                ],
                'background' => 'https://images.unsplash.com/photo-1521737711867-e3b97375f902?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80',
                'type' => 'hero',
                'order' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($sliders as $slider) {
            Slider::create($slider);
        }

        $this->command->info('✅ Sliders seeding completed!');
        $this->command->info('📊 Created ' . count($sliders) . ' sliders');
    }
}
