<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    // php artisan make:migration add_항목_to_테이블명_table --table=테이블명
    // php artisan migrate
    public function up(): void
    {
        Schema::table('skill', function (Blueprint $table) {
            // 추가할 항목 설정
            $table->string('category');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('skill', function (Blueprint $table) {
            // 추가할 항목 설정 (테이블 삭제시 같이 삭제)
            $table->dropColumn('category');
        });
    }
};