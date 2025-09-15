<?php

namespace Modules\ReviewManagement\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\ReviewManagement\App\Models\Review;
use Illuminate\Support\Facades\DB;

class InsertReviewsSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('⭐ Starting Reviews Seeding...');

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Review::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $reviews = [
            [
                'name' => [
                    'en' => 'Sarah Johnson',
                    'ar' => 'سارة جونسون'
                ],
                'text' => [
                    'en' => 'Excellent training program! The instructors were knowledgeable and the content was very practical. Highly recommended for anyone looking to advance their career.',
                    'ar' => 'برنامج تدريبي ممتاز! المدربون كانوا على دراية عالية والمحتوى كان عملياً جداً. أنصح به بشدة لأي شخص يسعى لتطوير مسيرته المهنية.'
                ],
                'image' => 'https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-4.0.3&auto=format&fit=crop&w=687&q=80',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => [
                    'en' => 'Ahmed Al-Rashid',
                    'ar' => 'أحمد الراشد'
                ],
                'text' => [
                    'en' => 'The leadership development course exceeded my expectations. The practical exercises and real-world case studies were incredibly valuable.',
                    'ar' => 'دورة تطوير القيادة تجاوزت توقعاتي. التمارين العملية ودراسات الحالة من العالم الحقيقي كانت قيمة بشكل لا يصدق.'
                ],
                'image' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=687&q=80',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => [
                    'en' => 'Maria Garcia',
                    'ar' => 'ماريا غارسيا'
                ],
                'text' => [
                    'en' => 'Outstanding digital skills training! The hands-on approach helped me master new technologies quickly and effectively.',
                    'ar' => 'تدريب ممتاز على المهارات الرقمية! النهج العملي ساعدني في إتقان التقنيات الجديدة بسرعة وفعالية.'
                ],
                'image' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&auto=format&fit=crop&w=687&q=80',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => [
                    'en' => 'David Chen',
                    'ar' => 'ديفيد تشين'
                ],
                'text' => [
                    'en' => 'The project management certification program was comprehensive and well-structured. I gained valuable skills that I use daily in my work.',
                    'ar' => 'برنامج شهادة إدارة المشاريع كان شاملاً ومنظماً بشكل جيد. اكتسبت مهارات قيمة أستخدمها يومياً في عملي.'
                ],
                'image' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=687&q=80',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => [
                    'en' => 'Fatima Al-Zahra',
                    'ar' => 'فاطمة الزهراء'
                ],
                'text' => [
                    'en' => 'Amazing soft skills development program! The communication and teamwork modules transformed how I interact with colleagues.',
                    'ar' => 'برنامج رائع لتطوير المهارات الناعمة! وحدات التواصل والعمل الجماعي غيرت طريقة تفاعلي مع الزملاء.'
                ],
                'image' => 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?ixlib=rb-4.0.3&auto=format&fit=crop&w=687&q=80',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => [
                    'en' => 'James Wilson',
                    'ar' => 'جيمس ويلسون'
                ],
                'text' => [
                    'en' => 'Professional development at its finest! The corporate training solutions helped our entire team improve performance significantly.',
                    'ar' => 'التطوير المهني في أفضل حالاته! حلول التدريب المؤسسي ساعدت فريقنا بالكامل على تحسين الأداء بشكل كبير.'
                ],
                'image' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-4.0.3&auto=format&fit=crop&w=687&q=80',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => [
                    'en' => 'Layla Hassan',
                    'ar' => 'ليلى حسن'
                ],
                'text' => [
                    'en' => 'The innovation and creativity workshop was inspiring! It opened my mind to new ways of thinking and problem-solving.',
                    'ar' => 'ورشة الابتكار والإبداع كانت ملهمة! فتحت ذهني لطرق جديدة في التفكير وحل المشاكل.'
                ],
                'image' => 'https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?ixlib=rb-4.0.3&auto=format&fit=crop&w=687&q=80',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => [
                    'en' => 'Michael Brown',
                    'ar' => 'مايكل براون'
                ],
                'text' => [
                    'en' => 'Excellent value for money! The flexible learning options allowed me to study at my own pace while maintaining my work schedule.',
                    'ar' => 'قيمة ممتازة مقابل المال! خيارات التعلم المرنة سمحت لي بالدراسة بالوتيرة التي تناسبني مع الحفاظ على جدول عملي.'
                ],
                'image' => 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-4.0.3&auto=format&fit=crop&w=687&q=80',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($reviews as $review) {
            Review::create($review);
        }

        $this->command->info('✅ Reviews seeding completed!');
        $this->command->info('📊 Created ' . count($reviews) . ' reviews');
    }
}

