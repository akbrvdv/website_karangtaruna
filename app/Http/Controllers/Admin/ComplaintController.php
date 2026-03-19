<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function index()
    {
        // Ambil semua data aduan dari database, urutkan dari yang paling baru
        $complaints = Complaint::latest()->get();
        return view('admin.complaints.index', compact('complaints'));
    }

    public function destroy(Complaint $complaint)
    {
        $complaint->delete();
        return redirect()->route('admin.complaints.index')->with('success', 'Aduan berhasil dihapus dari sistem.');
    }
}