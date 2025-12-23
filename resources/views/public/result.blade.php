<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الاستعلام عن نتيجة امتحان اجازة حفظ القران الكريم كاملاََ لعام 1447هـ - 2025م</title>

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

        /* Float Button Styles */
        .float-button-container {
            position: fixed;
            bottom: 30px;
            left: 30px;
            z-index: 1000;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .float-button-text {
            background: white;
            padding: 12px 20px;
            border-radius: 25px;
            box-shadow: 0 4px 15px rgba(60, 94, 127, 0.2);
            color: var(--primary-color);
            font-weight: 600;
            font-size: 14px;
            white-space: nowrap;
            opacity: 0;
            animation: fadeInText 1s ease-in-out 1s forwards;
        }

        @keyframes fadeInText {
            to {
                opacity: 1;
            }
        }

        .float-button {
            width: 65px;
            height: 65px;
            background: linear-gradient(135deg, var(--primary-color) 0%, #2d4960 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 28px;
            box-shadow: 0 4px 15px rgba(60, 94, 127, 0.3);
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            animation: pulse 2s infinite;
            flex-shrink: 0;
        }

        .float-button:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 20px rgba(60, 94, 127, 0.4);
        }

        @keyframes pulse {
            0%, 100% {
                box-shadow: 0 4px 15px rgba(60, 94, 127, 0.3);
            }
            50% {
                box-shadow: 0 4px 25px rgba(60, 94, 127, 0.5);
            }
        }

        .modal-header {
            background-color: var(--primary-color);
            color: white;
            border-bottom: none;
        }

        .modal-header .btn-close {
            filter: brightness(0) invert(1);
            opacity: 1;
        }

        @media (max-width: 768px) {
            .float-button-container {
                bottom: 20px;
                left: 20px;
            }

            .float-button {
                width: 60px;
                height: 60px;
                font-size: 24px;
            }

            .float-button-text {
                font-size: 12px;
                padding: 10px 15px;
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
            <h1 class="main-title">الاستعلام عن نتيجة امتحان اجازة حفظ القران الكريم كاملاََ لعام 1447هـ - 2025م</h1>
        </div>

        <div class="result-card">
            <div class="student-info">
                <div class="student-name">{{ $result->student_name }}</div>
                <div class="student-id">الرقم الوطني او الرقم الاداري: {{ $result->national_id }}</div>
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

            @if($result->grade === 'راسب')
                <!-- عرض للطالب الراسب -->
                <div class="text-center" style="padding: 40px 20px;">
                    <div style="background: #f8d7da; border: 2px solid #dc3545; border-radius: 15px; padding: 30px;">
                        <i class="ti ti-alert-circle" style="font-size: 48px; color: #dc3545;"></i>
                        <h3 style="color: #dc3545; font-weight: 800; margin-top: 20px;">راسب</h3>
                        <p style="color: #721c24; font-size: 18px; font-weight: 600; margin-top: 15px;">
                            النسبة المئوية: {{ number_format($result->percentage, 2) }}%
                        </p>
                    </div>
                </div>
            @else
                <!-- عرض للطالب الناجح -->
                <div class="scores-section">
                    <h4 class="mb-3" style="color: var(--primary-color); font-weight: 700;">نتائج الامتحانات</h4>

                    <div class="score-item">
                        <span class="score-label"><i class="ti ti-school me-2"></i>امتحان المنهج العلمي (من 40)</span>
                        <span class="score-value">{{ number_format($result->methodology_score, 2) }}</span>
                    </div>

                    <div class="score-item">
                        <span class="score-label"><i class="ti ti-microphone me-2"></i>امتحان الشفهي (من 100)</span>
                        <span class="score-value">{{ number_format($result->oral_score, 2) }}</span>
                    </div>

                    <div class="score-item">
                        <span class="score-label"><i class="ti ti-file-text me-2"></i>امتحان التحريري (من 140)</span>
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
                        <div class="grade-badge" style="background: #198754;">{{ $result->grade }}</div>
                    </div>
                </div>

                <div class="certificate-location">
                    <i class="ti ti-map-pin" style="font-size: 24px; color: #ffc107;"></i>
                    <div class="mt-2" style="font-weight: 700; font-size: 18px; color: #856404;">
                        مكان استلام الشهادة
                    </div>
                    <div class="mt-1" style="font-size: 20px; font-weight: 800; color: #664d03;">
                        {{ $result->certificate_location }}
                    </div>

                    <div class="mt-4" style="background: #e7f3ff; border-right: 4px solid #0d6efd; padding: 15px; border-radius: 8px;">
                        <p style="margin: 0; color: #084298; font-weight: 600; font-size: 14px;">
                            <i class="ti ti-info-circle me-2"></i>ملاحظة:
                        </p>
                        <p style="margin: 10px 0 0 0; color: #084298; font-size: 14px; line-height: 1.8;">
                            سيتم الإعلان عن موعد استلام الشهادة لاحقاً عبر الصفحة الرسمية لوزارة الأوقاف والشؤون الإسلامية
                        </p>
                        <a href="https://www.facebook.com/Owqaf.libya/?locale=ar_AR" target="_blank"
                           style="display: inline-block; margin-top: 10px; color: #0d6efd; text-decoration: none; font-weight: 600;">
                            <i class="ti ti-brand-facebook me-1"></i>
                            زيارة الصفحة الرسمية
                        </a>
                    </div>
                </div>
            @endif

            <div class="text-center mt-4">
                <a href="{{ route('home') }}" class="btn btn-back">
                    <i class="ti ti-arrow-right me-2"></i>العودة للاستعلام
                </a>
            </div>
        </div>
    </div>

    <!-- Float Button -->
    <div class="float-button-container">
        <div class="float-button-text">
            إن كانت لديك استفسار أو إشكالية اضغط هنا لإرسال رسالة
        </div>
        <button class="float-button" data-bs-toggle="modal" data-bs-target="#contactModal" title="تواصل مع الإدارة">
            <i class="ti ti-message-circle"></i>
        </button>
    </div>

    <!-- Contact Modal -->
    <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 16px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="contactModalLabel">
                        <i class="ti ti-message-dots me-2"></i>
                        تواصل مع الإدارة
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="padding: 2rem;">
                    @if(session('success'))
                        <div class="alert alert-success mb-3">
                            <i class="ti ti-check me-2"></i>
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger mb-3">
                            <i class="ti ti-alert-circle me-2"></i>
                            {{ session('error') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('contact.send') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="contact_name" class="form-label" style="font-weight: 600;">
                                <i class="ti ti-user me-1"></i>
                                الاسم الكامل
                            </label>
                            <input type="text"
                                   class="form-control"
                                   id="contact_name"
                                   name="name"
                                   placeholder="أدخل اسمك الكامل"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label for="contact_phone" class="form-label" style="font-weight: 600;">
                                <i class="ti ti-phone me-1"></i>
                                رقم الهاتف
                            </label>
                            <input type="tel"
                                   class="form-control"
                                   id="contact_phone"
                                   name="phone"
                                   placeholder="أدخل رقم الهاتف"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label for="contact_city" class="form-label" style="font-weight: 600;">
                                <i class="ti ti-map-pin me-1"></i>
                                المدينة
                            </label>
                            <input type="text"
                                   class="form-control"
                                   id="contact_city"
                                   name="city"
                                   placeholder="أدخل اسم المدينة"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label for="contact_national_id" class="form-label" style="font-weight: 600;">
                                الرقم الوطني
                            </label>
                            <input type="text"
                                   class="form-control"
                                   id="contact_national_id"
                                   name="national_id"
                                   placeholder="أدخل الرقم الوطني"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label for="contact_message" class="form-label" style="font-weight: 600;">
                                <i class="ti ti-message me-1"></i>
                                الرسالة
                            </label>
                            <textarea class="form-control"
                                      id="contact_message"
                                      name="message"
                                      rows="4"
                                      placeholder="اكتب رسالتك هنا..."
                                      required
                                      style="resize: vertical; min-height: 120px;"></textarea>
                        </div>

                        <input type="hidden" name="email_to" value="support@waqsa.ly">

                        <div class="d-grid">
                            <button type="submit" class="btn btn-print">
                                <i class="ti ti-send me-2"></i>
                                إرسال الرسالة
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
