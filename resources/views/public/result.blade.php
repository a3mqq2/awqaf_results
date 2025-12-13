<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نتيجة امتحان إجازة القرآن الكريم 2025م</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-color: #3c5e7f;
            --secondary-color: #998965;
            --success-color: #198754;
            --light-bg: #f8f9fa;
        }

        * {
            font-family: 'Cairo', sans-serif;
        }

        body {
            background: linear-gradient(135deg, var(--light-bg) 0%, #e9ecef 100%);
            min-height: 100vh;
            padding: 40px 20px;
        }

        .result-container {
            max-width: 900px;
            margin: 0 auto;
        }

        .header-section {
            background: white;
            border-radius: 20px;
            padding: 40px;
            text-align: center;
            box-shadow: 0 10px 40px rgba(60, 94, 127, 0.1);
            margin-bottom: 30px;
        }

        .main-title {
            color: var(--primary-color);
            font-weight: 800;
            font-size: 28px;
            margin: 20px 0 10px;
        }

        .result-card {
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 10px 40px rgba(60, 94, 127, 0.1);
            margin-bottom: 30px;
        }

        .student-info {
            background: linear-gradient(135deg, var(--primary-color), #4a6d8f);
            color: white;
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 30px;
        }

        .student-name {
            font-size: 24px;
            font-weight: 800;
            margin-bottom: 10px;
        }

        .student-id {
            font-size: 18px;
            opacity: 0.9;
        }

        .scores-section {
            margin: 30px 0;
        }

        .score-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            margin-bottom: 10px;
            background: #f8f9fa;
            border-radius: 10px;
            border-right: 4px solid var(--primary-color);
        }

        .score-label {
            font-weight: 600;
            color: var(--primary-color);
            font-size: 16px;
        }

        .score-value {
            font-weight: 700;
            font-size: 18px;
            color: #2d4660;
        }

        .total-score {
            background: linear-gradient(135deg, var(--success-color), #20a863);
            color: white;
            padding: 20px;
            border-radius: 15px;
            margin: 30px 0;
            text-align: center;
        }

        .total-label {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .total-value {
            font-size: 36px;
            font-weight: 800;
        }

        .grade-badge {
            display: inline-block;
            padding: 10px 30px;
            background: var(--secondary-color);
            color: white;
            border-radius: 50px;
            font-size: 20px;
            font-weight: 700;
            margin: 20px 0;
        }

        .certificate-location {
            background: #fff3cd;
            border: 2px solid #ffc107;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            margin-top: 20px;
        }

        .btn-print {
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 10px;
            padding: 12px 40px;
            font-size: 16px;
            font-weight: 700;
            transition: all 0.3s ease;
        }

        .btn-print:hover {
            background: #2d4660;
            transform: translateY(-2px);
        }

        .btn-back {
            background: #6c757d;
            color: white;
            border: none;
            border-radius: 10px;
            padding: 12px 40px;
            font-size: 16px;
            font-weight: 700;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-back:hover {
            background: #5a6268;
            color: white;
        }

        @media print {
            .no-print {
                display: none;
            }
            body {
                background: white;
            }
        }
    </style>
</head>
<body>
    <div class="result-container">
        <div class="header-section">
            <div class="logo-placeholder mb-3">
                <img src="{{ asset('logo-primary.png') }}" alt="شعار الوزارة" style="max-width: 100px;">
            </div>
            <h1 class="main-title">نتيجة امتحان إجازة القرآن الكريم</h1>
            <p class="text-muted">لسنة 2025م</p>
        </div>

        <div class="result-card">
            <div class="student-info">
                <div class="student-name">{{ $result->student_name }}</div>
                <div class="student-id">الرقم الوطني: {{ $result->national_id }}</div>
            </div>

            <div class="scores-section">
                <h4 class="mb-3" style="color: var(--primary-color); font-weight: 700;">بيانات الطالب</h4>

                <div class="score-item">
                    <span class="score-label"><i class="ti ti-book me-2"></i>الرواية</span>
                    <span class="score-value">{{ $result->narration }}</span>
                </div>

                <div class="score-item">
                    <span class="score-label"><i class="ti ti-pencil me-2"></i>الرسم</span>
                    <span class="score-value">{{ $result->drawing }}</span>
                </div>
            </div>

            <div class="scores-section">
                <h4 class="mb-3" style="color: var(--primary-color); font-weight: 700;">الدرجات التفصيلية</h4>

                <div class="score-item">
                    <span class="score-label"><i class="ti ti-school me-2"></i>المنهج العلمي (من 40)</span>
                    <span class="score-value">{{ number_format($result->methodology_score, 2) }}</span>
                </div>

                <div class="score-item">
                    <span class="score-label"><i class="ti ti-microphone me-2"></i>درجة الشفهي (من 100)</span>
                    <span class="score-value">{{ number_format($result->oral_score, 2) }}</span>
                </div>

                <div class="score-item">
                    <span class="score-label"><i class="ti ti-file-text me-2"></i>درجة التحريري (من 140)</span>
                    <span class="score-value">{{ number_format($result->written_score, 2) }}</span>
                </div>
            </div>

            <div class="total-score">
                <div class="total-label">المجموع الكلي</div>
                <div class="total-value">{{ number_format($result->total_score, 2) }} / 280</div>
                <div class="mt-2" style="font-size: 18px;">النسبة المئوية: {{ number_format($result->percentage, 2) }}%</div>
            </div>

            <div class="text-center">
                <div class="mb-3">
                    <strong style="color: var(--primary-color);">التقدير:</strong>
                    <div class="grade-badge">{{ $result->grade }}</div>
                </div>
            </div>

            <div class="certificate-location">
                <i class="ti ti-map-pin" style="font-size: 24px; color: #ffc107;"></i>
                <div class="mt-2" style="font-weight: 700; font-size: 18px; color: #856404;">
                    مكان الحصول على الشهادة
                </div>
                <div class="mt-1" style="font-size: 20px; font-weight: 800; color: #664d03;">
                    {{ $result->certificate_location }}
                </div>
            </div>

            <div class="text-center mt-4 no-print">
                <a href="{{ route('public.print', $result->id) }}" target="_blank" class="btn btn-print me-2">
                    <i class="ti ti-printer me-2"></i>طباعة النتيجة
                </a>
                <a href="{{ route('home') }}" class="btn btn-back">
                    <i class="ti ti-arrow-right me-2"></i>العودة للاستعلام
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
