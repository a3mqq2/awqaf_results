<?php

namespace App\Http\Controllers;

use App\Models\StudentResult;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StudentResultsImport;
use App\Exports\StudentResultsExport;
use App\Exports\StudentResultsTemplateExport;

class StudentResultController extends Controller
{
    public function index(Request $request)
    {
        $query = StudentResult::query();

        if ($request->filled('student_name')) {
            $query->where('student_name', 'like', '%' . $request->student_name . '%');
        }

        if ($request->filled('national_id')) {
            $query->where('national_id', 'like', '%' . $request->national_id . '%');
        }

        if ($request->filled('grade')) {
            $query->where('grade', $request->grade);
        }

        if ($request->filled('certificate_location')) {
            $query->where('certificate_location', $request->certificate_location);
        }

        if ($request->filled('min_score')) {
            $query->where('total_score', '>=', $request->min_score);
        }

        if ($request->filled('max_score')) {
            $query->where('total_score', '<=', $request->max_score);
        }

        $results = $query->orderBy('total_score', 'desc')->paginate(20);

        $grades = StudentResult::distinct()->pluck('grade');
        $locations = StudentResult::distinct()->pluck('certificate_location');

        return view('results.index', compact('results', 'grades', 'locations'));
    }

    public function create()
    {
        return view('results.create');
    }

    public function show(StudentResult $result)
    {
        return redirect()->route('admin.results.edit', $result);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_name' => 'required|string|max:255',
            'national_id' => 'required|string|unique:students_results,national_id',
            'narration' => 'required|string|max:100',
            'drawing' => 'required|string|max:100',
            'methodology_score' => 'required|numeric|min:0|max:40',
            'oral_score' => 'required|numeric|min:0|max:100',
            'written_score' => 'required|numeric|min:0|max:140',
            'grade' => 'required|string|max:50',
            'certificate_location' => 'required|string|max:255',
        ]);

        $validated['total_score'] = $validated['methodology_score'] +
                                    $validated['oral_score'] +
                                    $validated['written_score'];

        $validated['percentage'] = ($validated['total_score'] / 280) * 100;

        StudentResult::create($validated);

        return redirect()->route('admin.results.index')->with('success', 'تم إضافة النتيجة بنجاح');
    }

    public function edit(StudentResult $result)
    {
        return view('results.edit', compact('result'));
    }

    public function update(Request $request, StudentResult $result)
    {
        $validated = $request->validate([
            'student_name' => 'required|string|max:255',
            'national_id' => 'required|string|unique:students_results,national_id,' . $result->id,
            'narration' => 'required|string|max:100',
            'drawing' => 'required|string|max:100',
            'methodology_score' => 'required|numeric|min:0|max:40',
            'oral_score' => 'required|numeric|min:0|max:100',
            'written_score' => 'required|numeric|min:0|max:140',
            'grade' => 'required|string|max:50',
            'certificate_location' => 'required|string|max:255',
        ]);

        $validated['total_score'] = $validated['methodology_score'] +
                                    $validated['oral_score'] +
                                    $validated['written_score'];

        $validated['percentage'] = ($validated['total_score'] / 280) * 100;

        $result->update($validated);

        return redirect()->route('admin.results.index')->with('success', 'تم تحديث النتيجة بنجاح');
    }

    public function destroy(StudentResult $result)
    {
        $result->delete();
        return redirect()->route('admin.results.index')->with('success', 'تم حذف النتيجة بنجاح');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv'
        ]);

        try {
            Excel::import(new StudentResultsImport, $request->file('file'));
            return redirect()->route('admin.results.index')->with('success', 'تم استيراد النتائج بنجاح');
        } catch (\Exception $e) {
            return back()->with('error', 'حدث خطأ أثناء الاستيراد: ' . $e->getMessage());
        }
    }

    public function export()
    {
        return Excel::download(new StudentResultsExport, 'نتائج_الطلاب_' . date('Y-m-d') . '.xlsx');
    }

    public function downloadTemplate()
    {
        return Excel::download(new StudentResultsTemplateExport, 'قالب_النتائج.xlsx');
    }
}
