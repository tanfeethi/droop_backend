<?php

namespace Modules\AreaManagement\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\AreaManagement\App\Models\Area;

class InsertAreasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Area::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $areas = [
            ['en' => 'Al-Jouf', 'ar' => 'الجوف'],
            ['en' => 'Northern Borders', 'ar' => 'الحدود الشمالية'],
            ['en' => 'Tabuk', 'ar' => 'تبوك'],
            ['en' => 'Hafil', 'ar' => 'حافل'],
            ['en' => 'Al-Qateem', 'ar' => 'القطيم'],
            ['en' => 'Al-Madinah Al-Munawwarah', 'ar' => 'المدينة المنورة'],
            ['en' => 'Riyadh Region', 'ar' => 'المنطقة الرياض'],
            ['en' => 'Makkah Al-Mukarramah', 'ar' => 'مكة المكرمة'],
            ['en' => 'Al-Baha', 'ar' => 'الباحة'],
            ['en' => 'Asir', 'ar' => 'عسير'],
            ['en' => 'Najran', 'ar' => 'نجران'],
            ['en' => 'Jazan', 'ar' => 'جازان'],
            ['en' => 'Eastern Province', 'ar' => 'المنطقة الشرقية'],
        ];

        $data = [
            'number_of_projects' => 5000,
            'number_of_beneficiaries' => 30000,
            'number_of_programs' => 3000,
        ];

        foreach ($areas as $area) {
            Area::create([
                'location' => $area,
                'number_of_projects' => $data['number_of_projects'],
                'number_of_beneficiaries' => $data['number_of_beneficiaries'],
                'number_of_programs' => $data['number_of_programs'],
            ]);
        }
        
    }
}

