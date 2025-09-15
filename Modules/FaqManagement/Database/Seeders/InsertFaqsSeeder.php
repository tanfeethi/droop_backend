<?php

namespace Modules\FaqManagement\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\FaqManagement\App\Models\Faq;
use Illuminate\Support\Facades\DB;

class InsertFaqsSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('❓ Starting FAQs Seeding...');

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Faq::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $faqs = [
            [
                'question' => ['en' => 'What types of training programs do you offer?', 'ar' => 'ما أنواع برامج التدريب التي تقدمونها؟'],
                'answer' => ['en' => 'We offer comprehensive training programs including professional development, leadership skills, digital skills, corporate training, soft skills, and project management.', 'ar' => 'نقدم برامج تدريبية شاملة تشمل التطوير المهني ومهارات القيادة والمهارات الرقمية والتدريب المؤسسي والمهارات الناعمة وإدارة المشاريع.'],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => ['en' => 'How long are your training programs?', 'ar' => 'كم مدة برامج التدريب الخاصة بكم؟'],
                'answer' => ['en' => 'Our training programs vary in duration from intensive one-day workshops to comprehensive multi-week courses, depending on the specific program and learning objectives.', 'ar' => 'تختلف مدة برامج التدريب لدينا من ورش عمل مكثفة ليوم واحد إلى دورات شاملة لعدة أسابيع، حسب البرنامج المحدد وأهداف التعلم.'],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => ['en' => 'Do you provide certificates upon completion?', 'ar' => 'هل تقدمون شهادات عند الانتهاء؟'],
                'answer' => ['en' => 'Yes, we provide internationally recognized certificates upon successful completion of our training programs, which can enhance your professional credentials.', 'ar' => 'نعم، نقدم شهادات معترف بها دولياً عند الانتهاء بنجاح من برامج التدريب لدينا، مما يمكن أن يعزز مؤهلاتك المهنية.'],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => ['en' => 'Can you customize training for corporate clients?', 'ar' => 'هل يمكنكم تخصيص التدريب للعملاء المؤسسيين؟'],
                'answer' => ['en' => 'Absolutely! We specialize in creating customized training solutions tailored to your organization\'s specific needs, industry requirements, and business objectives.', 'ar' => 'بالطبع! نحن متخصصون في إنشاء حلول تدريبية مخصصة مصممة خصيصاً لاحتياجات مؤسستك ومتطلبات الصناعة وأهداف الأعمال.'],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => ['en' => 'What is the instructor-to-participant ratio?', 'ar' => 'ما نسبة المدرب إلى المشارك؟'],
                'answer' => ['en' => 'We maintain small class sizes with an optimal instructor-to-participant ratio to ensure personalized attention and effective learning for all participants.', 'ar' => 'نحافظ على أحجام فصول صغيرة مع نسبة مثلى من المدرب إلى المشارك لضمان الاهتمام الشخصي والتعلم الفعال لجميع المشاركين.'],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => ['en' => 'Do you offer online training options?', 'ar' => 'هل تقدمون خيارات التدريب عبر الإنترنت؟'],
                'answer' => ['en' => 'Yes, we offer both in-person and online training options to accommodate different learning preferences and geographical constraints.', 'ar' => 'نعم، نقدم خيارات التدريب الشخصي وعبر الإنترنت لاستيعاب تفضيلات التعلم المختلفة والقيود الجغرافية.'],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => ['en' => 'What is your refund policy?', 'ar' => 'ما هي سياسة الاسترداد الخاصة بكم؟'],
                'answer' => ['en' => 'We offer a flexible refund policy with full refund available up to 7 days before the program start date, and partial refunds for cancellations made closer to the start date.', 'ar' => 'نقدم سياسة استرداد مرنة مع استرداد كامل متاح حتى 7 أيام قبل تاريخ بداية البرنامج، واسترداد جزئي للإلغاءات التي تتم أقرب إلى تاريخ البداية.'],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => ['en' => 'How do I register for a training program?', 'ar' => 'كيف أسجل في برنامج تدريبي؟'],
                'answer' => ['en' => 'You can register through our website, contact us directly, or visit our training center. Our team will guide you through the registration process and answer any questions.', 'ar' => 'يمكنك التسجيل من خلال موقعنا الإلكتروني أو الاتصال بنا مباشرة أو زيارة مركز التدريب لدينا. سيرشدك فريقنا خلال عملية التسجيل ويجيب على أي أسئلة.'],
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }

        $this->command->info('✅ FAQs seeding completed!');
        $this->command->info('📊 Created ' . count($faqs) . ' FAQs');
    }
}
