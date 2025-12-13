<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;

class StudentResultsTemplateExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return new Collection([]);
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
            'التقدير',
            'مكان الحصول على الشهادة',
        ];
    }
}
