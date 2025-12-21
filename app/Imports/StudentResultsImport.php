<?php

namespace App\Imports;

use App\Models\StudentResult;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentResultsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Skip rows without national_id (required and unique)
        if (empty($row['alrkm_alotny'])) {
            return null;
        }

        // Handle numeric scores - some may be text like "راسبة" (failed)
        $methodologyScore = is_numeric($row['almnhg_alaalmy']) ? $row['almnhg_alaalmy'] : 0;
        $oralScore = is_numeric($row['drg_alshfhy']) ? $row['drg_alshfhy'] : 0;
        $writtenScore = is_numeric($row['drg_althryry']) ? $row['drg_althryry'] : 0;

        // Calculate total and percentage
        // المنهج العلمي: 40، الشفهي: 100، التحريري: 140 = المجموع الكلي 280
        $totalScore = $methodologyScore + $oralScore + $writtenScore;
        $percentage = ($totalScore / 280) * 100;

        // Calculate grade based on percentage
        if ($percentage >= 80) {
            $grade = 'ممتاز';
        } elseif ($percentage >= 65) {
            $grade = 'جيد جدًا';
        } elseif ($percentage >= 50) {
            $grade = 'جيد';
        } else {
            $grade = 'راسب';
        }

        return new StudentResult([
            'student_name' => $row['asm_altalb_alrbaaay'],
            'national_id' => $row['alrkm_alotny'],
            'narration' => $row['alroay'],
            'drawing' => $row['alrsm'],
            'methodology_score' => $methodologyScore,
            'oral_score' => $oralScore,
            'written_score' => $writtenScore,
            'total_score' => $totalScore,
            'percentage' => $percentage,
            'grade' => $grade,
            'certificate_location' => $row['mkan_alhsol_aal_alshhad'],
        ]);
    }
}
