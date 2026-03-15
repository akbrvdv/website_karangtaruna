<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Committee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CommitteeController extends Controller
{
    public function index()
    {
        // Diurutkan berdasarkan kolom 'order' (misal: 1 untuk Ketua, 2 Wakil, dst)
        $committees = Committee::orderBy('order', 'asc')->get();
        return view('admin.committees.index', compact('committees'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'order' => 'required|integer',
            'photo' => 'nullable|image|max:2048', // Max 2MB
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('committees', 'public');
        }

        Committee::create($validated);

        return back()->with('success', 'Data pengurus berhasil ditambahkan!');
    }

    public function destroy(Committee $committee)
    {
        // Hapus file foto dari storage jika ada
        if ($committee->photo) {
            Storage::disk('public')->delete($committee->photo);
        }
        
        $committee->delete();
        return back()->with('success', 'Data pengurus berhasil dihapus!');
    }
}
