<?php

namespace App\Imports;

use App\Models\StudentResult;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentResultsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Convert row to indexed array to handle inconsistent keys
        $values = array_values($row);

        // Extract data by position (based on the template structure)
        // Position 0: Student Name
        // Position 1: National ID
        // Position 2: Gender (not used)
        // Position 3: Narration
        // Position 4: Drawing
        // Position 5: Methodology Score
        // Position 6: Oral Score
        // Position 7: Written Score
        // Position 8-9: Formulas for total and percentage (not needed)
        // Position 10: Grade from Excel
        // Position 11: Certificate Location

        $studentName = $values[0] ?? null;
        $nationalId = $values[1] ?? null;
        $narration = $values[3] ?? null;
        $drawing = $values[4] ?? null;
        $methodologyScore = $values[5] ?? 0;
        $oralScore = $values[6] ?? 0;
        $writtenScore = $values[7] ?? 0;
        // Position 10 contains Excel formula, not calculated value - we'll calculate grade ourselves
        $certificateLocation = $values[11] ?? null;

        // Skip rows without required data
        if (empty($nationalId) || empty($studentName)) {
            return null;
        }

        // Convert national_id to string to handle large numbers
        $nationalId = is_numeric($nationalId)
            ? number_format($nationalId, 0, '', '')
            : (string) $nationalId;

        // Handle numeric scores - some may be text like "راسبة" (failed)
        $methodologyScore = is_numeric($methodologyScore) ? floatval($methodologyScore) : 0;
        $oralScore = is_numeric($oralScore) ? floatval($oralScore) : 0;
        $writtenScore = is_numeric($writtenScore) ? floatval($writtenScore) : 0;

        // Calculate total and percentage
        // المنهج العلمي: 40، الشفهي: 100، التحريري: 140 = المجموع الكلي 280
        $totalScore = $methodologyScore + $oralScore + $writtenScore;
        $percentage = ($totalScore / 280) * 100;

        // Calculate grade based on Excel formula:
        // =IF(J7="راسب","راسب",IF(J7>=85,"ممتاز",IF(J7>=75,"جيد جدا","راسب")))
        // Where J7 is the percentage

        // First check if percentage indicates failure (we need a threshold for "راسب")
        // Based on the formula, if percentage < 75 and not explicitly passing, it's راسب
        if ($percentage >= 85) {
            $grade = 'ممتاز';
        } elseif ($percentage >= 75) {
            $grade = 'جيد جدا';
        } else {
            $grade = 'راسب';
        }

        return new StudentResult([
            'student_name' => $studentName,
            'national_id' => $nationalId,
            'narration' => $narration,
            'drawing' => $drawing,
            'methodology_score' => $methodologyScore,
            'oral_score' => $oralScore,
            'written_score' => $writtenScore,
            'total_score' => $totalScore,
            'percentage' => $percentage,
            'grade' => $grade,
            'certificate_location' => $certificateLocation,
        ]);
    }
}
