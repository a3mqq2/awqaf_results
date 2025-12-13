<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>طباعة نتيجة امتحان إجازة القرآن الكريم 2025م</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Cairo', sans-serif;
        }

        body {
            background: white;
            padding: 40px;
        }

        .certificate {
            max-width: 900px;
            margin: 0 auto;
            border: 3px solid #3c5e7f;
            padding: 40px;
            position: relative;
        }

        .header {
            text-align: center;
            border-bottom: 2px solid #3c5e7f;
            padding-bottom: 30px;
            margin-bottom: 40px;
        }

        .logo {
            max-width: 120px;
            margin-bottom: 20px;
        }

        .main-title {
            color: #3c5e7f;
            font-size: 28px;
            font-weight: 800;
            margin-bottom: 10px;
        }

        .sub-title {
            color: #998965;
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .year {
            color: #6c757d;
            font-size: 18px;
            font-weight: 600;
        }

        .student-section {
            background: #f8f9fa;
            border: 2px solid #3c5e7f;
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 30px;
        }

        .student-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            font-size: 18px;
        }

        .student-row:last-child {
            margin-bottom: 0;
        }

        .label {
            font-weight: 700;
            color: #3c5e7f;
        }

        .value {
            font-weight: 600;
            color: #2d4660;
        }

        .section-title {
            color: #3c5e7f;
            font-size: 22px;
            font-weight: 800;
            margin: 30px 0 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #e9ecef;
        }

        .scores-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        .scores-table th,
        .scores-table td {
            border: 1px solid #dee2e6;
            padding: 15px;
            text-align: center;
        }

        .scores-table th {
            background: #3c5e7f;
            color: white;
            font-weight: 700;
            font-size: 16px;
        }

        .scores-table td {
            font-size: 18px;
            font-weight: 600;
        }

        .scores-table tr:nth-child(even) {
            background: #f8f9fa;
        }

        .total-section {
            background: linear-gradient(135deg, #198754, #20a863);
            color: white;
            border-radius: 10px;
            padding: 25px;
            text-align: center;
            margin: 30px 0;
        }

        .total-label {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .total-value {
            font-size: 42px;
            font-weight: 800;
            margin-bottom: 10px;
        }

        .total-percentage {
            font-size: 22px;
            font-weight: 700;
        }

        .grade-section {
            text-align: center;
            margin: 30px 0;
        }

        .grade-label {
            font-size: 20px;
            font-weight: 700;
            color: #3c5e7f;
            margin-bottom: 10px;
        }

        .grade-value {
            display: inline-block;
            background: #998965;
            color: white;
            padding: 15px 50px;
            border-radius: 50px;
            font-size: 26px;
            font-weight: 800;
        }

        .location-section {
            background: #fff3cd;
            border: 2px solid #ffc107;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            margin: 30px 0;
        }

        .location-label {
            font-size: 18px;
            font-weight: 700;
            color: #856404;
            margin-bottom: 10px;
        }

        .location-value {
            font-size: 24px;
            font-weight: 800;
            color: #664d03;
        }

        .footer {
            text-align: center;
            margin-top: 40px;
            padding-top: 20px;
            border-top: 2px solid #e9ecef;
            color: #6c757d;
            font-size: 14px;
        }

        .print-date {
            margin-top: 10px;
            font-weight: 600;
        }

        @media print {
            body {
                padding: 20px;
            }

            .certificate {
                border: 2px solid #3c5e7f;
                padding: 30px;
            }

            @page {
                size: A4;
                margin: 1cm;
            }
        }
    </style>
</head>
<body>
    <div class="certificate">
        <div class="header">
            <img src="{{ asset('logo-primary.png') }}" alt="شعار الوزارة" class="logo">
            <h1 class="main-title">شهادة نتيجة امتحان إجازة القرآن الكريم</h1>
            <p class="sub-title">General Authority of Awqaf and Islamic Affairs</p>
            <p class="year">لسنة 2025م</p>
        </div>

        <div class="student-section">
            <div class="student-row">
                <span class="label">اسم الطالب:</span>
                <span class="value">{{ $result->student_name }}</span>
            </div>
            <div class="student-row">
                <span class="label">الرقم الوطني:</span>
                <span class="value">{{ $result->national_id }}</span>
            </div>
            <div class="student-row">
                <span class="label">الرواية:</span>
                <span class="value">{{ $result->narration }}</span>
            </div>
            <div class="student-row">
                <span class="label">الرسم:</span>
                <span class="value">{{ $result->drawing }}</span>
            </div>
        </div>

        <h2 class="section-title">الدرجات التفصيلية</h2>

        <table class="scores-table">
            <thead>
                <tr>
                    <th>المادة</th>
                    <th>الدرجة العظمى</th>
                    <th>الدرجة المحصلة</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>المنهج العلمي</td>
                    <td>40</td>
                    <td>{{ number_format($result->methodology_score, 2) }}</td>
                </tr>
                <tr>
                    <td>الشفهي</td>
                    <td>100</td>
                    <td>{{ number_format($result->oral_score, 2) }}</td>
                </tr>
                <tr>
                    <td>التحريري</td>
                    <td>140</td>
                    <td>{{ number_format($result->written_score, 2) }}</td>
                </tr>
            </tbody>
        </table>

        <div class="total-section">
            <div class="total-label">المجموع الكلي</div>
            <div class="total-value">{{ number_format($result->total_score, 2) }} / 280</div>
            <div class="total-percentage">النسبة المئوية: {{ number_format($result->percentage, 2) }}%</div>
        </div>

        <div class="grade-section">
            <div class="grade-label">التقدير النهائي</div>
            <div class="grade-value">{{ $result->grade }}</div>
        </div>

        <div class="location-section">
            <div class="location-label">مكان الحصول على الشهادة</div>
            <div class="location-value">{{ $result->certificate_location }}</div>
        </div>

        <div class="footer">
            <p>هذه الشهادة صادرة إلكترونياً من نظام استعلام نتائج إجازة القرآن الكريم</p>
            <p class="print-date">تاريخ الطباعة: {{ now()->format('Y-m-d H:i') }}</p>
        </div>
    </div>

    <script>
        window.onload = function() {
            window.print();
        }
    </script>
</body>
</html>
