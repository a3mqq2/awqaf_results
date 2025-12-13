<?php

namespace App\Http\Controllers;

use App\Models\StudentResult;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalStudents = StudentResult::count();

        $gradeDistribution = StudentResult::select('grade', DB::raw('count(*) as count'))
            ->groupBy('grade')
            ->get()
            ->pluck('count', 'grade');

        $averageScores = [
            'methodology' => StudentResult::avg('methodology_score') ?? 0,
            'oral' => StudentResult::avg('oral_score') ?? 0,
            'written' => StudentResult::avg('written_score') ?? 0,
            'total' => StudentResult::avg('total_score') ?? 0,
        ];

        $highestScorers = StudentResult::orderBy('total_score', 'desc')
            ->limit(10)
            ->get();

        $certificateLocations = StudentResult::select('certificate_location', DB::raw('count(*) as count'))
            ->groupBy('certificate_location')
            ->get()
            ->pluck('count', 'certificate_location');

        $passRate = StudentResult::where('percentage', '>=', 50)->count();
        $passPercentage = $totalStudents > 0 ? ($passRate / $totalStudents) * 100 : 0;

        return view('dashboard', compact(
            'totalStudents',
            'gradeDistribution',
            'averageScores',
            'highestScorers',
            'certificateLocations',
            'passPercentage'
        ));
    }
}
