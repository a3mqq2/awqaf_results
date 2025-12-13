<?php

namespace App\Imports;

use App\Models\StudentResult;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class StudentResultsImport implements ToModel, WithHeadingRow, WithValidation
{
    public function model(array $row)
    {
        $totalScore = $row['الرواية'] + $row['الرسم'] + $row['المنهج_العلمي'] +
                      $row['درجة_الشفهي'] + $row['درجة_التحريري'];

        $percentage = ($totalScore / 500) * 100;

        return new StudentResult([
            'student_name' => $row['اسم_الطالب_الرباعي'],
            'national_id' => $row['الرقم_الوطني'],
            'narration_score' => $row['الرواية'],
            'drawing_score' => $row['الرسم'],
            'methodology_score' => $row['المنهج_العلمي'],
            'oral_score' => $row['درجة_الشفهي'],
            'written_score' => $row['درجة_التحريري'],
            'total_score' => $totalScore,
            'percentage' => $percentage,
            'grade' => $row['التقدير'],
            'certificate_location' => $row['مكان_الحصول_على_الشهادة'],
        ]);
    }

    public function rules(): array
    {
        return [
            'اسم_الطالب_الرباعي' => 'required|string',
            'الرقم_الوطني' => 'required|string|unique:students_results,national_id',
            'الرواية' => 'required|numeric|min:0|max:100',
            'الرسم' => 'required|numeric|min:0|max:100',
            'المنهج_العلمي' => 'required|numeric|min:0|max:100',
            'درجة_الشفهي' => 'required|numeric|min:0|max:100',
            'درجة_التحريري' => 'required|numeric|min:0|max:100',
            'التقدير' => 'required|string',
            'مكان_الحصول_على_الشهادة' => 'required|string',
        ];
    }
}
