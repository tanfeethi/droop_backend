<?php

namespace Modules\SliderManagement\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\SliderManagement\App\Models\Slider;
use Modules\SliderManagement\App\Models\SliderDetail;

class ProgramDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds for Program Details.
     */
    public function run(): void
    {
        $this->command->info('📚 Starting Program Details Seeding...');

        // Clear existing program details
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        SliderDetail::whereHas('slider', function($query) {
            $query->ofType('program');
        })->delete();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        // Get all program sliders
        $programSliders = Slider::ofType('program')->ordered()->get();

        if ($programSliders->isEmpty()) {
            $this->command->warn('⚠️ No program sliders found. Please run ProgramModuleSeeder first.');
            return;
        }

        $programDetails = $this->getProgramDetailsData($programSliders);

        foreach ($programDetails as $detail) {
            SliderDetail::create($detail);
        }

        $this->command->info('✅ Program Details seeded successfully!');
        $this->command->info('📊 Created ' . count($programDetails) . ' program details');
        $this->command->info('🎯 Each program slider now has 5 detailed items');
    }

    /**
     * Get program details data
     */
    private function getProgramDetailsData($programSliders)
    {
        return [
            // Professional Training Programs - 5 details
            [
                'slider_id' => $programSliders->where('order', 1)->first()->id,
                'title' => [
                    'en' => '🎯 Leadership Development',
                    'ar' => '🎯 تطوير القيادة'
                ],
                'description' => [
                    'en' => 'Master essential leadership skills and learn to inspire and guide your team to success.',
                    'ar' => 'أتقن مهارات القيادة الأساسية وتعلم كيفية إلهام وتوجيه فريقك نحو النجاح.'
                ],
                'image' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80',
                'order' => 1
            ],
            [
                'slider_id' => $programSliders->where('order', 1)->first()->id,
                'title' => [
                    'en' => '💼 Project Management',
                    'ar' => '💼 إدارة المشاريع'
                ],
                'description' => [
                    'en' => 'Learn proven methodologies to plan, execute, and deliver projects on time and within budget.',
                    'ar' => 'تعلم منهجيات مثبتة لتخطيط وتنفيذ وتسليم المشاريع في الوقت المحدد وفي حدود الميزانية.'
                ],
                'image' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80',
                'order' => 2
            ],
            [
                'slider_id' => $programSliders->where('order', 1)->first()->id,
                'title' => [
                    'en' => '📊 Data Analysis',
                    'ar' => '📊 تحليل البيانات'
                ],
                'description' => [
                    'en' => 'Develop analytical skills to extract insights from data and make informed business decisions.',
                    'ar' => 'طور مهارات تحليلية لاستخراج الرؤى من البيانات واتخاذ قرارات عمل مدروسة.'
                ],
                'image' => 'https://images.unsplash.com/photo-1521737711867-e3b97375f902?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80',
                'order' => 3
            ],
            [
                'slider_id' => $programSliders->where('order', 1)->first()->id,
                'title' => [
                    'en' => '🤝 Team Collaboration',
                    'ar' => '🤝 التعاون الجماعي'
                ],
                'description' => [
                    'en' => 'Enhance teamwork skills and learn to build effective collaborative environments.',
                    'ar' => 'عزز مهارات العمل الجماعي وتعلم كيفية بناء بيئات تعاونية فعالة.'
                ],
                'image' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2071&q=80',
                'order' => 4
            ],
            [
                'slider_id' => $programSliders->where('order', 1)->first()->id,
                'title' => [
                    'en' => '🚀 Innovation & Creativity',
                    'ar' => '🚀 الابتكار والإبداع'
                ],
                'description' => [
                    'en' => 'Foster creative thinking and learn to drive innovation in your organization.',
                    'ar' => 'عزز التفكير الإبداعي وتعلم كيفية دفع الابتكار في مؤسستك.'
                ],
                'image' => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80',
                'order' => 5
            ],

            // Expert Instructors - 5 details
            [
                'slider_id' => $programSliders->where('order', 2)->first()->id,
                'title' => [
                    'en' => '👨‍💼 Industry Veterans',
                    'ar' => '👨‍💼 خبراء الصناعة'
                ],
                'description' => [
                    'en' => 'Learn from professionals with 15+ years of industry experience and proven track records.',
                    'ar' => 'تعلم من المحترفين ذوي الخبرة الصناعية لأكثر من 15 عاماً والسجلات المثبتة.'
                ],
                'image' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80',
                'order' => 1
            ],
            [
                'slider_id' => $programSliders->where('order', 2)->first()->id,
                'title' => [
                    'en' => '🎓 Certified Professionals',
                    'ar' => '🎓 محترفون معتمدون'
                ],
                'description' => [
                    'en' => 'Our instructors hold prestigious certifications from leading industry organizations.',
                    'ar' => 'مدربونا يحملون شهادات مرموقة من المنظمات الرائدة في الصناعة.'
                ],
                'image' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80',
                'order' => 2
            ],
            [
                'slider_id' => $programSliders->where('order', 2)->first()->id,
                'title' => [
                    'en' => '📚 Academic Excellence',
                    'ar' => '📚 التميز الأكاديمي'
                ],
                'description' => [
                    'en' => 'Instructors with advanced degrees and continuous professional development.',
                    'ar' => 'مدربون ذوو درجات أكاديمية متقدمة وتطوير مهني مستمر.'
                ],
                'image' => 'https://images.unsplash.com/photo-1521737711867-e3b97375f902?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80',
                'order' => 3
            ],
            [
                'slider_id' => $programSliders->where('order', 2)->first()->id,
                'title' => [
                    'en' => '🌍 Global Perspective',
                    'ar' => '🌍 منظور عالمي'
                ],
                'description' => [
                    'en' => 'International instructors bringing diverse perspectives and global best practices.',
                    'ar' => 'مدربون دوليون يجلبون منظورات متنوعة وأفضل الممارسات العالمية.'
                ],
                'image' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2071&q=80',
                'order' => 4
            ],
            [
                'slider_id' => $programSliders->where('order', 2)->first()->id,
                'title' => [
                    'en' => '💡 Practical Experience',
                    'ar' => '💡 الخبرة العملية'
                ],
                'description' => [
                    'en' => 'Real-world case studies and hands-on experience from actual industry projects.',
                    'ar' => 'دراسات حالة من العالم الحقيقي وخبرة عملية من مشاريع صناعية فعلية.'
                ],
                'image' => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80',
                'order' => 5
            ],

            // Success Stories - 5 details
            [
                'slider_id' => $programSliders->where('order', 3)->first()->id,
                'title' => [
                    'en' => '📈 Career Advancement',
                    'ar' => '📈 التقدم المهني'
                ],
                'description' => [
                    'en' => '85% of our graduates received promotions within 6 months of completing their programs.',
                    'ar' => '85% من خريجينا حصلوا على ترقيات خلال 6 أشهر من إكمال برامجهم.'
                ],
                'image' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80',
                'order' => 1
            ],
            [
                'slider_id' => $programSliders->where('order', 3)->first()->id,
                'title' => [
                    'en' => '💰 Salary Increase',
                    'ar' => '💰 زيادة الراتب'
                ],
                'description' => [
                    'en' => 'Average salary increase of 40% reported by our program graduates.',
                    'ar' => 'زيادة متوسط الراتب بنسبة 40% كما أفاد خريجو برامجنا.'
                ],
                'image' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80',
                'order' => 2
            ],
            [
                'slider_id' => $programSliders->where('order', 3)->first()->id,
                'title' => [
                    'en' => '🏢 Entrepreneurship',
                    'ar' => '🏢 ريادة الأعمال'
                ],
                'description' => [
                    'en' => 'Over 200 graduates have successfully launched their own businesses.',
                    'ar' => 'أكثر من 200 خريج نجحوا في إطلاق أعمالهم الخاصة.'
                ],
                'image' => 'https://images.unsplash.com/photo-1521737711867-e3b97375f902?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80',
                'order' => 3
            ],
            [
                'slider_id' => $programSliders->where('order', 3)->first()->id,
                'title' => [
                    'en' => '🌐 Global Opportunities',
                    'ar' => '🌐 الفرص العالمية'
                ],
                'description' => [
                    'en' => 'Graduates working in 25+ countries across different industries.',
                    'ar' => 'خريجون يعملون في أكثر من 25 دولة عبر صناعات مختلفة.'
                ],
                'image' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2071&q=80',
                'order' => 4
            ],
            [
                'slider_id' => $programSliders->where('order', 3)->first()->id,
                'title' => [
                    'en' => '⭐ Client Satisfaction',
                    'ar' => '⭐ رضا العملاء'
                ],
                'description' => [
                    'en' => '98% client satisfaction rate with our training programs and services.',
                    'ar' => 'معدل رضا العملاء 98% مع برامجنا التدريبية وخدماتنا.'
                ],
                'image' => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80',
                'order' => 5
            ],

            // Industry Certifications - 5 details
            [
                'slider_id' => $programSliders->where('order', 4)->first()->id,
                'title' => [
                    'en' => '🏆 PMP Certification',
                    'ar' => '🏆 شهادة PMP'
                ],
                'description' => [
                    'en' => 'Project Management Professional certification recognized globally by PMI.',
                    'ar' => 'شهادة محترف إدارة المشاريع المعترف بها عالمياً من معهد إدارة المشاريع.'
                ],
                'image' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80',
                'order' => 1
            ],
            [
                'slider_id' => $programSliders->where('order', 4)->first()->id,
                'title' => [
                    'en' => '📊 Six Sigma Certification',
                    'ar' => '📊 شهادة سيكس سيجما'
                ],
                'description' => [
                    'en' => 'Quality management certification for process improvement and defect reduction.',
                    'ar' => 'شهادة إدارة الجودة لتحسين العمليات وتقليل العيوب.'
                ],
                'image' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80',
                'order' => 2
            ],
            [
                'slider_id' => $programSliders->where('order', 4)->first()->id,
                'title' => [
                    'en' => '💼 Agile Certification',
                    'ar' => '💼 شهادة أجايل'
                ],
                'description' => [
                    'en' => 'Agile methodology certification for modern project management approaches.',
                    'ar' => 'شهادة منهجية أجايل لأساليب إدارة المشاريع الحديثة.'
                ],
                'image' => 'https://images.unsplash.com/photo-1521737711867-e3b97375f902?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80',
                'order' => 3
            ],
            [
                'slider_id' => $programSliders->where('order', 4)->first()->id,
                'title' => [
                    'en' => '🔒 IT Security Certification',
                    'ar' => '🔒 شهادة أمان تقنية المعلومات'
                ],
                'description' => [
                    'en' => 'Cybersecurity certification for protecting digital assets and information.',
                    'ar' => 'شهادة الأمن السيبراني لحماية الأصول الرقمية والمعلومات.'
                ],
                'image' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2071&q=80',
                'order' => 4
            ],
            [
                'slider_id' => $programSliders->where('order', 4)->first()->id,
                'title' => [
                    'en' => '📈 Business Analytics',
                    'ar' => '📈 تحليل الأعمال'
                ],
                'description' => [
                    'en' => 'Data-driven decision making certification for business intelligence.',
                    'ar' => 'شهادة اتخاذ القرارات القائمة على البيانات لذكاء الأعمال.'
                ],
                'image' => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80',
                'order' => 5
            ],

            // Flexible Learning Options - 5 details
            [
                'slider_id' => $programSliders->where('order', 5)->first()->id,
                'title' => [
                    'en' => '💻 Online Learning',
                    'ar' => '💻 التعلم عبر الإنترنت'
                ],
                'description' => [
                    'en' => 'Interactive online courses with live sessions and recorded content available 24/7.',
                    'ar' => 'دورات تفاعلية عبر الإنترنت مع جلسات مباشرة ومحتوى مسجل متاح 24/7.'
                ],
                'image' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80',
                'order' => 1
            ],
            [
                'slider_id' => $programSliders->where('order', 5)->first()->id,
                'title' => [
                    'en' => '🏢 In-Person Training',
                    'ar' => '🏢 التدريب الشخصي'
                ],
                'description' => [
                    'en' => 'Traditional classroom setting with hands-on practice and direct instructor interaction.',
                    'ar' => 'بيئة الفصل الدراسي التقليدية مع الممارسة العملية والتفاعل المباشر مع المدرب.'
                ],
                'image' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80',
                'order' => 2
            ],
            [
                'slider_id' => $programSliders->where('order', 5)->first()->id,
                'title' => [
                    'en' => '🔄 Hybrid Learning',
                    'ar' => '🔄 التعلم المختلط'
                ],
                'description' => [
                    'en' => 'Best of both worlds: combine online flexibility with in-person collaboration.',
                    'ar' => 'أفضل ما في العالمين: اجمع بين مرونة الإنترنت والتعاون الشخصي.'
                ],
                'image' => 'https://images.unsplash.com/photo-1521737711867-e3b97375f902?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80',
                'order' => 3
            ],
            [
                'slider_id' => $programSliders->where('order', 5)->first()->id,
                'title' => [
                    'en' => '⏰ Self-Paced Learning',
                    'ar' => '⏰ التعلم بالوتيرة الذاتية'
                ],
                'description' => [
                    'en' => 'Learn at your own pace with flexible schedules and extended access to materials.',
                    'ar' => 'تعلم بالوتيرة التي تناسبك مع جداول مرنة ووصول ممتد للمواد.'
                ],
                'image' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2071&q=80',
                'order' => 4
            ],
            [
                'slider_id' => $programSliders->where('order', 5)->first()->id,
                'title' => [
                    'en' => '📱 Mobile Learning',
                    'ar' => '📱 التعلم المحمول'
                ],
                'description' => [
                    'en' => 'Access courses and materials on any device, anywhere, anytime.',
                    'ar' => 'الوصول إلى الدورات والمواد على أي جهاز، في أي مكان، في أي وقت.'
                ],
                'image' => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80',
                'order' => 5
            ]
        ];
    }
}
