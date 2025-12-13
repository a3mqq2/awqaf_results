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
        Schema::create('students_results', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->string('national_id')->unique();
            // بيانات الطالب
            $table->string('narration'); // الرواية
            $table->string('drawing'); // الرسم
            // الدرجات
            $table->decimal('methodology_score', 5, 2); // من 40
            $table->decimal('oral_score', 5, 2); // من 100
            $table->decimal('written_score', 5, 2); // من 140
            $table->decimal('total_score', 5, 2); // المجموع من 280
            $table->decimal('percentage', 5, 2); // النسبة المئوية
            $table->string('grade'); // التقدير
            $table->string('certificate_location'); // مكان الحصول على الشهادة
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students_results');
    }
};
