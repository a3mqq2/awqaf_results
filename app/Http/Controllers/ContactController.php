<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'city' => 'required|string|max:255',
            'national_id' => 'required|string|max:255',
            'message' => 'required|string',
            'email_to' => 'required|email',
        ]);

        try {
            Mail::raw(
                "رسالة جديدة من موقع نتائج امتحان اجازة حفظ القران الكريم\n\n" .
                "الاسم: {$validated['name']}\n" .
                "رقم الهاتف: {$validated['phone']}\n" .
                "المدينة: {$validated['city']}\n" .
                "الرقم الوطني: {$validated['national_id']}\n\n" .
                "الرسالة:\n{$validated['message']}",
                function ($message) use ($validated) {
                    $message->to($validated['email_to'])
                        ->subject('رسالة جديدة من موقع النتائج - ' . $validated['name'])
                        ->replyTo($validated['phone'] . '@noreply.waqsa.ly', $validated['name']);
                }
            );

            return redirect()->back()->with('success', 'تم إرسال رسالتك بنجاح. سيتم التواصل معك قريباً.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'حدث خطأ أثناء إرسال الرسالة. يرجى المحاولة لاحقاً.');
        }
    }
}
