<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الاستعلام عن نتيجة امتحان إجازة حفظ القرآن الكريم كاملًا لعام 1447هـ - 2025م</title>

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
        }

        .btn-search {
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 10px;
            padding: 12px 40px;
            font-size: 18px;
            font-weight: 700;
            width: 100%;
        }

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
            color: var(--primary-color);
            font-weight: 600;
            font-size: 14px;
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
            border: none;
        }
    </style>
</head>
<body>
    <div class="search-container">
        <div class="logo-section">
            <img src="{{ asset('logo-primary.png') }}" alt="شعار الوزارة" style="max-width: 100px;">
            <h1 class="main-title">الاستعلام عن نتيجة امتحان إجازة حفظ القرآن الكريم كاملًا لعام 1447هـ - 2025م</h1>
            <p class="hijri-date">{{ now()->format('Y-m-d') }}</p>
        </div>

        <div class="search-card">
            <form action="{{ route('public.search') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="national_id" class="form-label">
                        الرقم الوطني أو الرقم الإداري
                    </label>
                    <input
                        type="text"
                        class="form-control"
                        id="national_id"
                        name="national_id"
                        placeholder="أدخل الرقم الوطني أو الرقم الإداري"
                        required
                    >
                </div>

                <button type="submit" class="btn btn-search">
                    الاستعلام عن النتيجة
                </button>
            </form>
        </div>
    </div>

    <div class="float-button-container">
        <div class="float-button-text">
            إن كانت لديك استفسار أو إشكالية اضغط هنا لإرسال رسالة
        </div>
        <button class="float-button" data-bs-toggle="modal" data-bs-target="#contactModal">
            <i class="ti ti-message-circle"></i>
        </button>
    </div>

    <div class="modal fade" id="contactModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">تواصل مع الإدارة</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('contact.send') }}">
                        @csrf
                        <input type="text" class="form-control mb-3" name="name" placeholder="أدخل اسمك الكامل" required>
                        <input type="tel" class="form-control mb-3" name="phone" placeholder="أدخل رقم الهاتف" required>
                        <input type="text" class="form-control mb-3" name="city" placeholder="أدخل اسم المدينة" required>
                        <input type="text" class="form-control mb-3" name="national_id" placeholder="أدخل الرقم الوطني" required>
                        <textarea class="form-control mb-3" name="message" rows="4" placeholder="اكتب رسالتك هنا..." required></textarea>
                        <button type="submit" class="btn btn-search">إرسال الرسالة</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>