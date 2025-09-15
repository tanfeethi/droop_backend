<?php

namespace Modules\TestimonialManagement\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\TestimonialManagement\App\Models\Testimonial;
use Illuminate\Support\Facades\DB;

class InsertTestimonialsSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('💬 Starting Testimonials Seeding...');

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Testimonial::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $testimonials = [
            [
                'name' => ['en' => 'Abdullah Al-Sheikh', 'ar' => 'عبدالله الشيخ'],
                'position' => ['en' => 'Marketing Manager', 'ar' => 'مدير التسويق'],
                'text' => ['en' => 'The professional development program transformed my career. The trainers are exceptional and the content is highly relevant to today\'s business needs.', 'ar' => 'برنامج التطوير المهني غير مسيرتي المهنية. المدربون استثنائيون والمحتوى ذو صلة عالية باحتياجات الأعمال اليوم.'],
                'social_type' => 'linkedin',
                'image' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => ['en' => 'Noura Al-Mutawa', 'ar' => 'نورا المطوع'],
                'position' => ['en' => 'HR Director', 'ar' => 'مديرة الموارد البشرية'],
                'text' => ['en' => 'Outstanding training experience! The leadership development course helped me become a more effective leader and improved our team performance significantly.', 'ar' => 'تجربة تدريب متميزة! ساعدني دورة تطوير القيادة على أن أصبح قائداً أكثر فعالية وحسنت أداء فريقنا بشكل كبير.'],
                'social_type' => 'twitter',
                'image' => 'https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => ['en' => 'Saud Al-Rashid', 'ar' => 'سعود الراشد'],
                'position' => ['en' => 'Project Manager', 'ar' => 'مدير المشاريع'],
                'text' => ['en' => 'The digital skills training was exactly what our team needed. We\'ve seen immediate improvements in our productivity and digital capabilities.', 'ar' => 'كان التدريب على المهارات الرقمية هو بالضبط ما يحتاجه فريقنا. لاحظنا تحسينات فورية في إنتاجيتنا وقدراتنا الرقمية.'],
                'social_type' => 'facebook',
                'image' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => ['en' => 'Mariam Al-Hajri', 'ar' => 'مريم الهاجري'],
                'position' => ['en' => 'Operations Director', 'ar' => 'مديرة العمليات'],
                'text' => ['en' => 'Excellent corporate training program! The customized approach and expert trainers made all the difference for our organization.', 'ar' => 'برنامج تدريب مؤسسي ممتاز! النهج المخصص والمدربون الخبراء أحدثوا كل الفرق لمؤسستنا.'],
                'social_type' => 'instagram',
                'image' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => ['en' => 'Fahad Al-Sabah', 'ar' => 'فهد الصباح'],
                'position' => ['en' => 'CEO', 'ar' => 'الرئيس التنفيذي'],
                'text' => ['en' => 'Durub Almustaqbal has been instrumental in developing our leadership team. Their programs are world-class and deliver real results.', 'ar' => 'دروب المستقبل كان له دور أساسي في تطوير فريق القيادة لدينا. برامجهم عالمية المستوى وتقدم نتائج حقيقية.'],
                'social_type' => 'linkedin',
                'image' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => ['en' => 'Layla Al-Mansouri', 'ar' => 'ليلى المنصوري'],
                'position' => ['en' => 'Training Coordinator', 'ar' => 'منسقة التدريب'],
                'text' => ['en' => 'The soft skills development program helped our team communicate better and work more effectively together. Highly recommended!', 'ar' => 'ساعد برنامج تطوير المهارات الناعمة فريقنا على التواصل بشكل أفضل والعمل معاً بفعالية أكبر. أنصح به بشدة!'],
                'social_type' => 'twitter',
                'image' => 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }

        $this->command->info('✅ Testimonials seeding completed!');
        $this->command->info('📊 Created ' . count($testimonials) . ' testimonials');
    }
}
