<?php

namespace App\Http\Controllers;

use App\Models\StudentResult;
use Illuminate\Http\Request;

class PublicResultController extends Controller
{
    public function index()
    {
        return view('public.search');
    }

    public function search(Request $request)
    {
        $request->validate([
            'national_id' => 'required|string'
        ], [
            'national_id.required' => 'الرجاء إدخال الرقم الوطني'
        ]);

        $result = StudentResult::where('national_id', $request->national_id)->first();

        if (!$result) {
            return back()->with('error', 'لم يتم العثور على نتيجة بهذا الرقم الوطني');
        }

        return view('public.result', compact('result'));
    }

    public function print($id)
    {
        $result = StudentResult::findOrFail($id);
        return view('public.print', compact('result'));
    }
}
