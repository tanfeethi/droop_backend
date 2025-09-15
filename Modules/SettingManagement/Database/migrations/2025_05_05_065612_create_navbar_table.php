<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('navbar', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title');
            $table->integer('parent_id')->nullable();
            $table->timestamps();
        });

        DB::table('navbar')->insert([
            [
                'name' => 'home',
                'title' => json_encode(['en' => 'Home', 'ar' => 'الرئيسية']),
                'parent_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'abut',
                'title' => json_encode(['en' => 'Abut Us', 'ar' => 'من نحن']),
                'parent_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'media_center',
                'title' => json_encode(['en' => 'Media Center', 'ar' => 'المركز الاعلامى']),
                'parent_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'programs_projects',
                'title' => json_encode(['en' => 'Programs and projects', 'ar' => 'البرامج والمشاريع']),
                'parent_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'partners',
                'title' => json_encode(['en' => 'Partners', 'ar' => 'الشركاء']),
                'parent_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'join_us',
                'title' => json_encode(['en' => 'join us', 'ar' => 'انضم الينا']),
                'parent_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'vision_mission',
                'title' => json_encode(['en' => 'Vision, Mission, Goals and Values', 'ar' => 'الرؤية والرسالة والاهداف والقيم']),
                'parent_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'board_of_directors',
                'title' => json_encode(['en' => 'Board of Directors', 'ar' => 'مجلس الادارة']),
                'parent_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'executive_team',
                'title' => json_encode(['en' => 'Executive Team', 'ar' => 'فريق تنفيذي']),
                'parent_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'news',
                'title' => json_encode(['en' => 'News', 'ar' => 'الاخبار']),
                'parent_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'reports',
                'title' => json_encode(['en' => 'Reports', 'ar' => 'التقارير']),
                'parent_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'visual_identity',
                'title' => json_encode(['en' => 'Visual identity', 'ar' => 'الهوية البصرية']),
                'parent_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'join_us_child',
                'title' => json_encode(['en' => 'join us', 'ar' => 'انضم الينا']),
                'parent_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'vacancies',
                'title' => json_encode(['en' => 'Vacancies', 'ar' => 'الوظائف الشاغرة']),
                'parent_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('navbar');
    }
};
