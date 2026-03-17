<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Committee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Wajib ditambahkan untuk hapus foto

class CommitteeController extends Controller
{
    public function index()
    {
        $committees = Committee::oldest()->get();
        return view('admin.committees.index', compact('committees'));
    }

    public function create()
    {
        return view('admin.committees.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validasi foto (maks 2MB)
        ]);

        $imagePath = null;
        if ($request->hasFile('photo')) {
            // Simpan foto ke folder storage/app/public/pengurus
            $imagePath = $request->file('photo')->store('pengurus', 'public');
        }

        Committee::create([
            'name' => $request->name,
            'position' => $request->position,
            'photo' => $imagePath,
        ]);

        return redirect()->route('admin.committees.index')->with('success', 'Pengurus berhasil ditambahkan!');
    }

    public function edit(Committee $committee)
    {
        return view('admin.committees.edit', compact('committee'));
    }

    public function update(Request $request, Committee $committee)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imagePath = $committee->photo; // Gunakan foto lama sebagai default

        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($committee->photo && Storage::disk('public')->exists($committee->photo)) {
                Storage::disk('public')->delete($committee->photo);
            }
            // Simpan foto baru
            $imagePath = $request->file('photo')->store('pengurus', 'public');
        }

        $committee->update([
            'name' => $request->name,
            'position' => $request->position,
            'photo' => $imagePath,
        ]);

        return redirect()->route('admin.committees.index')->with('success', 'Data pengurus berhasil diperbarui!');
    }

    public function destroy(Committee $committee)
    {
        // Hapus file foto dari folder jika ada
        if ($committee->photo && Storage::disk('public')->exists($committee->photo)) {
            Storage::disk('public')->delete($committee->photo);
        }
        
        $committee->delete();
        return redirect()->route('admin.committees.index')->with('success', 'Pengurus berhasil dihapus!');
    }
}