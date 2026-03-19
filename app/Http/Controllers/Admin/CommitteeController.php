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
        $committees = Committee::oldest()->get();
        return view('admin.committees.index', compact('committees'));
    }

    public function create()
    {
        return view('admin.committees.create');
    }

    public function store(Request $request)
    {
        // 1. Validasi Ketat (Terutama Ukuran Foto)
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Max 2MB
        ]);

        $data = $request->all();

        // 2. Logika Upload Modern
        if ($request->hasFile('image')) {
            // Kita pakai cara paling aman di Windows: store() otomatis bikin nama unik
            $path = $request->file('image')->store('committees', 'public');
            $data['image'] = $path; // Simpan path-nya (misal: committees/unique_name.jpg)
        }

        Committee::create($data);
        return redirect()->route('admin.committees.index')->with('success', 'Pengurus berhasil ditambahkan!');
    }

    public function edit(Committee $committee)
    {
        return view('admin.committees.edit', compact('committee'));
    }

    public function update(Request $request, Committee $committee)
    {
        // 1. Validasi
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Max 2MB
        ]);

        $data = $request->all();

        // 2. Logika Update Foto Modern
        if ($request->hasFile('image')) {
            // Hapus foto LAMA jika ada
            if ($committee->image) {
                Storage::disk('public')->delete($committee->image);
            }
            // Simpan foto BARU
            $path = $request->file('image')->store('committees', 'public');
            $data['image'] = $path;
        }

        $committee->update($data);
        return redirect()->route('admin.committees.index')->with('success', 'Data pengurus berhasil diperbarui!');
    }

    public function destroy(Committee $committee)
    {
        // Hapus foto dari storage saat data dihapus
        if ($committee->image) {
            Storage::disk('public')->delete($committee->image);
        }
        $committee->delete();
        return redirect()->route('admin.committees.index')->with('success', 'Pengurus berhasil dihapus!');
    }
}