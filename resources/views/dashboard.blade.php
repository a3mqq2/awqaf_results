@extends('layouts.app')

@section('title', 'لوحة التحكم - نتائج إجازة القرآن الكريم 2025م')

@push('styles')
<style>
    :root {
        --primary-gradient: linear-gradient(135deg, #3c5e7f 0%, #2e4a67 100%);
        --success-gradient: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
        --warning-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        --info-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    }

    .stats-card {
        border: none;
        border-radius: 12px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        position: relative;
    }

    .stats-card .card-body {
        padding: 1rem;
    }

    .stats-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--bs-primary), var(--bs-info));
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .stats-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }

    .stats-card:hover::before {
        opacity: 1;
    }

    .stats-icon {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        position: relative;
        overflow: hidden;
    }

    .stats-icon::before {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        background: inherit;
        opacity: 0.5;
        filter: blur(20px);
    }

    .stats-number {
        font-size: 24px;
        font-weight: 700;
        line-height: 1;
        margin-bottom: 4px;
        background: linear-gradient(135deg, var(--bs-primary), var(--bs-info));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .stats-label {
        font-size: 12px;
        font-weight: 500;
        color: #6c757d;
        margin-bottom: 0;
    }

    .chart-card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.08);
    }

    .chart-card:hover {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.12);
    }

    .chart-card .card-header {
        padding: 1rem;
        background: transparent;
        border-bottom: 1px solid #f0f0f0;
    }

    .chart-card .card-body {
        padding: 1rem;
    }

    .chart-card .card-title {
        font-size: 14px;
        font-weight: 600;
    }

    .top-students-list {
        max-height: 500px;
        overflow-y: auto;
    }

    .student-item {
        padding: 0.75rem;
        border-bottom: 1px solid #e9ecef;
        transition: background 0.2s ease;
    }

    .student-item:hover {
        background: #f8f9fa;
    }

    .student-rank {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 14px;
    }

    .rank-1 { background: linear-gradient(135deg, #FFD700, #FFA500); color: white; }
    .rank-2 { background: linear-gradient(135deg, #C0C0C0, #808080); color: white; }
    .rank-3 { background: linear-gradient(135deg, #CD7F32, #8B4513); color: white; }
    .rank-other { background: #e9ecef; color: #6c757d; }
</style>
@endpush

@section('content')

        <!-- إحصائيات رئيسية -->
        <div class="row g-2 mb-3 mt-2">
            <!-- إجمالي الطلاب -->
            <div class="col-md-3">
                <div class="card stats-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <div class="stats-number">{{ $totalStudents }}</div>
                                <p class="stats-label">إجمالي الطلاب</p>
                            </div>
                            <div class="stats-icon" style="background: var(--primary-gradient);">
                                <i class="ti ti-users text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- نسبة النجاح -->
            <div class="col-md-3">
                <div class="card stats-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <div class="stats-number">{{ number_format($passPercentage, 1) }}%</div>
                                <p class="stats-label">نسبة النجاح</p>
                            </div>
                            <div class="stats-icon" style="background: var(--success-gradient);">
                                <i class="ti ti-chart-line text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- متوسط الدرجات -->
            <div class="col-md-3">
                <div class="card stats-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <div class="stats-number">{{ number_format($averageScores['total'], 1) }}</div>
                                <p class="stats-label">متوسط الدرجات</p>
                            </div>
                            <div class="stats-icon" style="background: var(--info-gradient);">
                                <i class="ti ti-calculator text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- عدد التقديرات -->
            <div class="col-md-3">
                <div class="card stats-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <div class="stats-number">{{ $gradeDistribution->count() }}</div>
                                <p class="stats-label">عدد التقديرات</p>
                            </div>
                            <div class="stats-icon" style="background: var(--warning-gradient);">
                                <i class="ti ti-trophy text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-2">
            <!-- توزيع التقديرات -->
            <div class="col-md-6">
                <div class="card chart-card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="ti ti-chart-pie me-2"></i>توزيع التقديرات
                        </h5>
                    </div>
                    <div class="card-body">
                        <canvas id="gradeChart" height="300"></canvas>
                    </div>
                </div>
            </div>

            <!-- متوسط الدرجات حسب المادة -->
            <div class="col-md-6">
                <div class="card chart-card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="ti ti-chart-bar me-2"></i>متوسط الدرجات حسب المادة
                        </h5>
                    </div>
                    <div class="card-body">
                        <canvas id="subjectScoresChart" height="300"></canvas>
                    </div>
                </div>
            </div>

            <!-- أماكن الحصول على الشهادة -->
            <div class="col-md-6">
                <div class="card chart-card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="ti ti-map-pin me-2"></i>توزيع أماكن الحصول على الشهادة
                        </h5>
                    </div>
                    <div class="card-body">
                        <canvas id="locationChart" height="300"></canvas>
                    </div>
                </div>
            </div>

            <!-- أعلى الدرجات -->
            <div class="col-md-6">
                <div class="card chart-card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="ti ti-trophy me-2"></i>أوائل الطلاب (أعلى 10 درجات)
                        </h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="top-students-list">
                            @foreach($highestScorers as $index => $student)
                            <div class="student-item d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="student-rank {{ $index < 3 ? 'rank-' . ($index + 1) : 'rank-other' }}">
                                        {{ $index + 1 }}
                                    </div>
                                    <div>
                                        <div class="fw-bold" style="font-size: 13px;">{{ $student->student_name }}</div>
                                        <small class="text-muted" style="font-size: 11px;">{{ $student->certificate_location }}</small>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <div class="fw-bold text-primary" style="font-size: 14px;">{{ number_format($student->total_score, 2) }}</div>
                                    <small class="text-muted" style="font-size: 11px;">{{ $student->grade }}</small>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // توزيع التقديرات
    const gradeCtx = document.getElementById('gradeChart').getContext('2d');
    new Chart(gradeCtx, {
        type: 'doughnut',
        data: {
            labels: {!! json_encode($gradeDistribution->keys()) !!},
            datasets: [{
                data: {!! json_encode($gradeDistribution->values()) !!},
                backgroundColor: [
                    '#3c5e7f',
                    '#11998e',
                    '#f093fb',
                    '#4facfe',
                    '#f5576c',
                    '#38ef7d',
                    '#ffd700',
                ],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        font: { family: 'Cairo', size: 14 },
                        padding: 15
                    }
                }
            }
        }
    });

    // متوسط الدرجات حسب المادة
    const subjectCtx = document.getElementById('subjectScoresChart').getContext('2d');
    new Chart(subjectCtx, {
        type: 'bar',
        data: {
            labels: ['المنهج العلمي (40)', 'الشفهي (100)', 'التحريري (140)'],
            datasets: [{
                label: 'متوسط الدرجات',
                data: [
                    {{ number_format($averageScores['methodology'], 2) }},
                    {{ number_format($averageScores['oral'], 2) }},
                    {{ number_format($averageScores['written'], 2) }}
                ],
                backgroundColor: [
                    'rgba(240, 147, 251, 0.8)',
                    'rgba(79, 172, 254, 0.8)',
                    'rgba(245, 87, 108, 0.8)'
                ],
                borderWidth: 0,
                borderRadius: 8
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    max: 140,
                    ticks: { font: { family: 'Cairo' } }
                },
                x: {
                    ticks: { font: { family: 'Cairo', size: 12 } }
                }
            },
            plugins: {
                legend: { display: false }
            }
        }
    });

    // توزيع أماكن الحصول على الشهادة
    const locationCtx = document.getElementById('locationChart').getContext('2d');
    new Chart(locationCtx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($certificateLocations->keys()) !!},
            datasets: [{
                label: 'عدد الطلاب',
                data: {!! json_encode($certificateLocations->values()) !!},
                backgroundColor: 'rgba(60, 94, 127, 0.8)',
                borderWidth: 0,
                borderRadius: 8
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            indexAxis: 'y',
            scales: {
                x: {
                    beginAtZero: true,
                    ticks: { font: { family: 'Cairo' } }
                },
                y: {
                    ticks: { font: { family: 'Cairo', size: 12 } }
                }
            },
            plugins: {
                legend: { display: false }
            }
        }
    });
</script>
@endpush
