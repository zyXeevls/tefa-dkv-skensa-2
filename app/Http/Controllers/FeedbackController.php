<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    // Tampilkan form user
    public function create()
    {
        return view('feedback.form');
    }

    // Simpan feedback
    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_no' => 'required|string|max:100',
            'customer_name' => 'required|string|max:100',
            'company' => 'nullable|string|max:100',
            'product' => 'required|string|max:100',
            'order_date' => 'required|date',
            'date_start' => 'required|date',
            'date_end' => 'required|date',
            'rating_quality' => 'required|integer|min:1|max:5',
            'rating_timeliness' => 'required|integer|min:1|max:5',
            'rating_service' => 'required|integer|min:1|max:5',
            'rating_price' => 'required|integer|min:1|max:5',
            'rating_overall' => 'required|integer|min:1|max:5',
            'comment' => 'required|string',
        ]);

        Feedback::create($validated);

        return back()->with('success', 'Terima kasih atas feedback Anda!');
    }

    // Tampilkan di dashboard admin
    public function index()
    {
        $feedbacks = Feedback::latest()->get();
        return view('admin.saran', compact('feedbacks'));
    }

    public function destroy($id)
    {
        $feedback = Feedback::findOrFail($id);
        $feedback->delete();

        return redirect()->back()->with('success', 'Feedback berhasil dihapus.');
    }
}
