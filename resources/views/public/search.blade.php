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
            --light-bg: #f8f9fa;
        }

        * {
            font-family: 'Cairo', sans-serif;
        }

        body {
            background: linear-gradient(135deg, var(--light-bg) 0%, #e9ecef 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .search-container {
            max-width: 700px;
            width: 100%;
        }

        .logo-section {
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
            margin-bottom: 10px;
            line-height: 1.6;
        }

        .sub-title {
            color: var(--secondary-color);
            font-weight: 600;
            font-size: 18px;
            margin-bottom: 5px;
        }

        .hijri-date {
            color: #6c757d;
            font-size: 16px;
            margin-top: 10px;
        }

        .search-card {
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 10px 40px rgba(60, 94, 127, 0.1);
        }

        .form-label {
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 10px;
        }

        .form-control {
            border: 2px solid #e0e6ed;
            border-radius: 10px;
            padding: 12px 20px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(60, 94, 127, 0.15);
        }

        .btn-search {
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 10px;
            padding: 12px 40px;
            font-size: 18px;
            font-weight: 700;
            transition: all 0.3s ease;
            width: 100%;
        }

        .btn-search:hover {
            background: #2d4660;
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(60, 94, 127, 0.3);
        }

        .alert {
            border-radius: 10px;
            padding: 15px 20px;
            font-weight: 600;
        }

        /* Float Button Styles */
        .float-button-container {
            position: fixed;
            bottom: 30px;
            left: 30px;
            z-index: 1000;
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
        }
    </style>
</head>
<body>
    <div class="search-container">
        <div class="logo-section">
            <div class="logo-placeholder mb-4">
                <img src="{{ asset('logo-primary.png') }}" alt="شعار الوزارة" style="max-width: 100px;">
            </div>
            <h1 class="main-title">الاستعلام عن نتيجة امتحان اجازة حفظ القران الكريم كاملاََ لعام 1447هـ - 2025م</h1>
            <p class="hijri-date" id="hijriDate">{{ now()->format('Y-m-d') }}</p>
        </div>

        <div class="search-card">
            @if(session('success'))
                <div class="alert alert-success mb-4">
                    <i class="ti ti-check me-2"></i>
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger mb-4">
                    <i class="ti ti-alert-circle me-2"></i>
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('public.search') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="national_id" class="form-label">
                        <i class="ti ti-id me-2"></i>الرقم الوطني او الرقم الاداري
                    </label>
                    <input
                        type="text"
                        class="form-control @error('national_id') is-invalid @enderror"
                        id="national_id"
                        name="national_id"
                        placeholder="أدخل الرقم الوطني او الرقم الاداري"
                        value="{{ old('national_id') }}"
                        required
                        autofocus
                    >
                    @error('national_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-search">
                    <i class="ti ti-search me-2"></i>استعلام عن النتيجة
                </button>
            </form>
        </div>
    </div>

    <!-- Float Button -->
    <div class="float-button-container">
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
                            <button type="submit" class="btn btn-search">
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
    <script>
        // Convert to Hijri date (simple approximation)
        function getHijriDate() {
            const gregorianDate = new Date();
            const hijriYear = Math.floor((gregorianDate.getFullYear() - 622) * 1.030684);
            document.getElementById('hijriDate').innerHTML =
                ` الموافق ${hijriYear}هـ `;
        }
        getHijriDate();
    </script>
</body>
</html>
