<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
            Schema::table('settings', function (Blueprint $table) {
                $table->string('statistics')->nullable();
            });

            DB::table('settings')
                ->where('id', 1)
                ->update(['statistics' =>  json_encode(['trips' => 150, 'hours' => 200,'programs' => 50, 'clients' => 950])]);
            Artisan::call('config:cache');

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn('statistics');
        });
    }
};
