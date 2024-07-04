<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('portfolio_des', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('portfolio_id')->foreignId('portfolio_id')->constrained()->cascadeOnDelete();
            $table->string('des');
            $table->timestamps();

            // unsignedBigInteger = 다른 테이블에서 데이터를 끌어오고 싶을 때 사용하는 외래 키
            // foreignId = 외래키 지정
            // constrained = 설정한 외래키가 존재하지 않으면 생성할 수 없도록 하는 것
            // cascadeOnDelete = 외래키의 데이터가 삭제되면 같이 삭제
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolio_des');
    }
};