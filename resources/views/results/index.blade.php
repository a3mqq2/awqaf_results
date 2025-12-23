@extends('layouts.app')

@section('title', 'إدارة النتائج')

@push('styles')
<style>
    .table tbody tr.pass-row {
        background-color: #d4edda !important;
    }
    .table tbody tr.pass-row:hover {
        background-color: #c3e6cb !important;
    }
    .table tbody tr.fail-row {
        background-color: #f8d7da !important;
    }
    .table tbody tr.fail-row:hover {
        background-color: #f5c6cb !important;
    }
</style>
@endpush

@section('content')

        <!-- فلتر متقدم -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="ti ti-filter me-2"></i>فلترة متقدمة
                </h5>
            </div>
            <div class="card-body">
                <form method="GET" action="{{ route('admin.results.index') }}">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label class="form-label">اسم الطالب</label>
                            <input type="text" name="student_name" class="form-control"
                                   value="{{ request('student_name') }}" placeholder="ابحث باسم الطالب">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">الرقم الوطني او الرقم الاداري</label>
                            <input type="text" name="national_id" class="form-control"
                                   value="{{ request('national_id') }}" placeholder="ابحث بالرقم الوطني او الرقم الاداري">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">التقدير</label>
                            <select name="grade" class="form-select">
                                <option value="">جميع التقديرات</option>
                                @foreach($grades as $grade)
                                    <option value="{{ $grade }}" {{ request('grade') == $grade ? 'selected' : '' }}>
                                        {{ $grade }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">مكان الشهادة</label>
                            <select name="certificate_location" class="form-select">
                                <option value="">جميع الأماكن</option>
                                @foreach($locations as $location)
                                    <option value="{{ $location }}" {{ request('certificate_location') == $location ? 'selected' : '' }}>
                                        {{ $location }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">الدرجة من</label>
                            <input type="number" name="min_score" class="form-control"
                                   value="{{ request('min_score') }}" placeholder="0" step="0.01">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">الدرجة إلى</label>
                            <input type="number" name="max_score" class="form-control"
                                   value="{{ request('max_score') }}" placeholder="280" step="0.01">
                        </div>
                        <div class="col-md-6 d-flex align-items-end gap-2">
                            <button type="submit" class="btn btn-primary flex-fill">
                                <i class="ti ti-search me-2"></i>بحث
                            </button>
                            <a href="{{ route('admin.results.index') }}" class="btn btn-secondary flex-fill">
                                <i class="ti ti-refresh me-2"></i>إعادة تعيين
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- أدوات Excel -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="row g-3 align-items-center">
                    <div class="col-md-3">
                        <a href="{{ route('admin.results.create') }}" class="btn btn-primary w-100">
                            <i class="ti ti-plus me-2"></i>إضافة نتيجة جديدة
                        </a>
                    </div>
                    <div class="col-md-3">
                        <form action="{{ route('admin.results.import') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="input-group">
                                <input type="file" name="file" class="form-control" required accept=".xlsx,.xls,.csv">
                                <button type="submit" class="btn btn-success">
                                    <i class="ti ti-upload me-2"></i>استيراد
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('admin.results.export') }}" class="btn btn-info w-100">
                            <i class="ti ti-download me-2"></i>تصدير النتائج
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('admin.results.template') }}" class="btn btn-warning w-100">
                            <i class="ti ti-file-download me-2"></i>تحميل القالب
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- جدول النتائج -->
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>اسم الطالب</th>
                                <th>الرقم الوطني او الرقم الاداري</th>
                                <th>الرواية</th>
                                <th>الرسم</th>
                                <th>المنهج العلمي</th>
                                <th>الشفهي</th>
                                <th>التحريري</th>
                                <th>المجموع</th>
                                <th>النسبة</th>
                                <th>التقدير</th>
                                <th>مكان الشهادة</th>
                                <th>إجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($results as $result)
                            <tr class="{{ $result->grade === 'راسب' ? 'fail-row' : 'pass-row' }}">
                                <td>{{ $loop->iteration + ($results->currentPage() - 1) * $results->perPage() }}</td>
                                <td><strong>{{ $result->student_name }}</strong></td>
                                <td>{{ $result->national_id }}</td>
                                <td>{{ $result->narration }}</td>
                                <td>{{ $result->drawing }}</td>
                                <td>{{ number_format($result->methodology_score, 2) }}</td>
                                <td>{{ number_format($result->oral_score, 2) }}</td>
                                <td>{{ number_format($result->written_score, 2) }}</td>
                                <td><strong>{{ number_format($result->total_score, 2) }}</strong></td>
                                <td>{{ number_format($result->percentage, 2) }}%</td>
                                <td>
                                    <span class="badge {{ $result->grade === 'راسب' ? 'bg-danger' : 'bg-success' }}">
                                        {{ $result->grade }}
                                    </span>
                                </td>
                                <td>{{ $result->certificate_location }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.results.edit', $result) }}"
                                           class="btn btn-sm btn-warning">
                                            <i class="ti ti-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.results.destroy', $result) }}"
                                              method="POST"
                                              onsubmit="return confirm('هل أنت متأكد من حذف هذه النتيجة؟')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="ti ti-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="13" class="text-center py-4">
                                    <i class="ti ti-inbox" style="font-size: 48px; color: #ccc;"></i>
                                    <p class="text-muted mt-2">لا توجد نتائج</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if($results->hasPages())
                <div class="mt-4">
                    {{ $results->links() }}
                </div>
                @endif
            </div>
        </div>
@endsection
