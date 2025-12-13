<?php

namespace App\Exports;

use App\Models\StudentResult;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class StudentResultsExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return StudentResult::all();
    }

    public function headings(): array
    {
        return [
            'اسم الطالب الرباعي',
            'الرقم الوطني',
            'الرواية',
            'الرسم',
            'المنهج العلمي',
            'درجة الشفهي',
            'درجة التحريري',
            'المجموع',
            'النسبة المئوية',
            'التقدير',
            'مكان الحصول على الشهادة',
        ];
    }

    public function map($result): array
    {
        return [
            $result->student_name,
            $result->national_id,
            $result->narration_score,
            $result->drawing_score,
            $result->methodology_score,
            $result->oral_score,
            $result->written_score,
            $result->total_score,
            $result->percentage . '%',
            $result->grade,
            $result->certificate_location,
        ];
    }
}
