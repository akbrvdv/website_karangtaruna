<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Committee;
use App\Models\Complaint;

class PublicController extends Controller
{
        public function index()
    {
        // Mengambil 3 berita terbaru untuk beranda
        $posts = \App\Models\Post::latest()->take(3)->get();
        return view('public.home', compact('posts'));
    }

    public function berita()
    {
        // Mengambil semua berita (bisa pakai paginate)
        $posts = \App\Models\Post::latest()->paginate(9);
        return view('public.berita', compact('posts'));
    }

    public function pengurus()
    {
        // Pastikan Anda sudah punya model Committee
        $committees = \App\Models\Committee::all(); 
        return view('public.pengurus', compact('committees'));
    }

    public function aduan()
{
    return view('public.aduan');
}

    public function storeAduan(\Illuminate\Http\Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        \App\Models\Complaint::create([
            'name' => $request->name, // Boleh kosong (nullable)
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'Terima kasih! Aduan/Usulan Anda telah berhasil dikirim ke pengurus Karang Taruna.');
    }
}
