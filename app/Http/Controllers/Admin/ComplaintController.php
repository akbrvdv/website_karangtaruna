<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function index()
    {
        $complaints = Complaint::latest()->get();
        return view('admin.complaints.index', compact('complaints'));
    }

    public function update(Request $request, Complaint $complaint)
    {
        $request->validate(['status' => 'required|in:pending,diproses,selesai']);
        $complaint->update(['status' => $request->status]);
        
        return back()->with('success', 'Status aduan diperbarui!');
    }
}
