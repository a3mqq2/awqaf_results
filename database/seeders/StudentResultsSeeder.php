<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StudentResult;
use Faker\Factory as Faker;

class StudentResultsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('ar_SA');

        $narrations = ['حفص عن عاصم', 'ورش عن نافع', 'قالون عن نافع', 'الدوري عن أبي عمرو'];
        $drawings = ['العثماني', 'الإملائي'];
        $locations = ['بنغازي', 'طرابلس', 'مصراتة', 'الزاوية', 'صبراتة', 'زليتن', 'طبرق', 'درنة'];

        for ($i = 1; $i <= 50; $i++) {
            // توليد درجات عشوائية
            $methodologyScore = rand(0, 40 * 100) / 100; // من 40
            $oralScore = rand(0, 100 * 100) / 100; // من 100
            $writtenScore = rand(0, 140 * 100) / 100; // من 140

            $totalScore = $methodologyScore + $oralScore + $writtenScore;
            $percentage = ($totalScore / 280) * 100;

            // تحديد التقدير بناءً على النسبة المئوية
            if ($percentage >= 85) {
                $grade = 'ممتاز';
            } elseif ($percentage >= 75) {
                $grade = 'جيد جداً';
            } elseif ($percentage >= 65) {
                $grade = 'جيد';
            } elseif ($percentage >= 50) {
                $grade = 'مقبول';
            } else {
                $grade = 'راسب';
            }

            StudentResult::create([
                'student_name' => $faker->name,
                'national_id' => '2' . str_pad($i, 11, '0', STR_PAD_LEFT),
                'narration' => $narrations[array_rand($narrations)],
                'drawing' => $drawings[array_rand($drawings)],
                'methodology_score' => $methodologyScore,
                'oral_score' => $oralScore,
                'written_score' => $writtenScore,
                'total_score' => $totalScore,
                'percentage' => $percentage,
                'grade' => $grade,
                'certificate_location' => $locations[array_rand($locations)],
            ]);
        }
    }
}
