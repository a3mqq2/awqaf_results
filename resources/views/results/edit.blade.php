@extends('layouts.app')

@section('content')
<div class="page-header">
  <div class="page-block">
    <div class="row align-items-center">
      <div class="col-md-12">
        <div class="page-header-title">
          <h4 class="m-b-10">تعديل النتيجة</h4>
        </div>
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">لوحة التحكم</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.results.index') }}">إدارة النتائج</a></li>
          <li class="breadcrumb-item" aria-current="page">تعديل النتيجة</li>
        </ul>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5>بيانات الطالب والنتيجة</h5>
        <form action="{{ route('admin.results.destroy', $result) }}" method="POST"
              onsubmit="return confirm('هل أنت متأكد من حذف هذه النتيجة؟');">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger btn-sm">
            <i class="ti ti-trash me-1"></i>حذف النتيجة
          </button>
        </form>
      </div>
      <div class="card-body">
        <form action="{{ route('admin.results.update', $result) }}" method="POST">
          @csrf
          @method('PUT')

          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label">اسم الطالب الرباعي <span class="text-danger">*</span></label>
              <input type="text" class="form-control @error('student_name') is-invalid @enderror"
                     name="student_name" value="{{ old('student_name', $result->student_name) }}" required>
              @error('student_name')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-label">الرقم الوطني <span class="text-danger">*</span></label>
              <input type="text" class="form-control @error('national_id') is-invalid @enderror"
                     name="national_id" value="{{ old('national_id', $result->national_id) }}" required>
              @error('national_id')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label">الرواية <span class="text-danger">*</span></label>
              <input type="text" class="form-control @error('narration') is-invalid @enderror"
                     name="narration" value="{{ old('narration', $result->narration) }}"
                     placeholder="مثال: حفص عن عاصم" required>
              @error('narration')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-label">الرسم <span class="text-danger">*</span></label>
              <input type="text" class="form-control @error('drawing') is-invalid @enderror"
                     name="drawing" value="{{ old('drawing', $result->drawing) }}"
                     placeholder="مثال: العثماني" required>
              @error('drawing')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <div class="row">
            <div class="col-md-4 mb-3">
              <label class="form-label">درجة المنهج العلمي (من 40) <span class="text-danger">*</span></label>
              <input type="number" step="0.01" min="0" max="40"
                     class="form-control @error('methodology_score') is-invalid @enderror"
                     name="methodology_score" value="{{ old('methodology_score', $result->methodology_score) }}" required>
              @error('methodology_score')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-md-4 mb-3">
              <label class="form-label">درجة الشفهي (من 100) <span class="text-danger">*</span></label>
              <input type="number" step="0.01" min="0" max="100"
                     class="form-control @error('oral_score') is-invalid @enderror"
                     name="oral_score" value="{{ old('oral_score', $result->oral_score) }}" required>
              @error('oral_score')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-md-4 mb-3">
              <label class="form-label">درجة التحريري (من 140) <span class="text-danger">*</span></label>
              <input type="number" step="0.01" min="0" max="140"
                     class="form-control @error('written_score') is-invalid @enderror"
                     name="written_score" value="{{ old('written_score', $result->written_score) }}" required>
              @error('written_score')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label">التقدير <span class="text-danger">*</span></label>
              <select class="form-control @error('grade') is-invalid @enderror" name="grade" required>
                <option value="">اختر التقدير</option>
                <option value="ممتاز" {{ old('grade', $result->grade) == 'ممتاز' ? 'selected' : '' }}>ممتاز</option>
                <option value="جيد جداً" {{ old('grade', $result->grade) == 'جيد جداً' ? 'selected' : '' }}>جيد جداً</option>
                <option value="جيد" {{ old('grade', $result->grade) == 'جيد' ? 'selected' : '' }}>جيد</option>
                <option value="مقبول" {{ old('grade', $result->grade) == 'مقبول' ? 'selected' : '' }}>مقبول</option>
                <option value="راسب" {{ old('grade', $result->grade) == 'راسب' ? 'selected' : '' }}>راسب</option>
              </select>
              @error('grade')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-label">مكان الحصول على الشهادة <span class="text-danger">*</span></label>
              <input type="text" class="form-control @error('certificate_location') is-invalid @enderror"
                     name="certificate_location" value="{{ old('certificate_location', $result->certificate_location) }}"
                     placeholder="مثال: مدينة بنغازي" required>
              @error('certificate_location')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <div class="alert alert-info mb-3">
            <i class="ti ti-info-circle me-2"></i>
            <strong>ملاحظة:</strong> سيتم حساب المجموع الكلي والنسبة المئوية تلقائياً من مجموع الدرجات المدخلة (المنهج العلمي 40 + الشفهي 100 + التحريري 140 = 280).
          </div>

          <div class="row mb-3">
            <div class="col-md-4">
              <div class="card bg-light">
                <div class="card-body p-2">
                  <small class="text-muted">المجموع الحالي</small>
                  <h5 class="mb-0">{{ number_format($result->total_score, 2) }} / 280</h5>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card bg-light">
                <div class="card-body p-2">
                  <small class="text-muted">النسبة المئوية</small>
                  <h5 class="mb-0">{{ number_format($result->percentage, 2) }}%</h5>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card bg-light">
                <div class="card-body p-2">
                  <small class="text-muted">التقدير الحالي</small>
                  <h5 class="mb-0">{{ $result->grade }}</h5>
                </div>
              </div>
            </div>
          </div>

          <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">
              <i class="ti ti-device-floppy me-2"></i>حفظ التعديلات
            </button>
            <a href="{{ route('admin.results.index') }}" class="btn btn-secondary">
              <i class="ti ti-arrow-right me-2"></i>رجوع
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
