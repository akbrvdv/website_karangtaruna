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
        $posts = Post::with('category', 'user')->where('is_published', true)->latest()->take(3)->get();
        return view('public.home', compact('posts'));
    }

    public function berita()
    {
        $posts = Post::with('category', 'user')->where('is_published', true)->latest()->paginate(9);
        return view('public.berita', compact('posts'));
    }

    public function pengurus()
    {
        $committees = Committee::orderBy('order', 'asc')->get();
        return view('public.pengurus', compact('committees'));
    }

    public function aduan()
    {
        return view('public.aduan');
    }

    public function storeAduan(Request $request)
    {
        $validated = $request->validate([
            'sender_name' => 'required|string|max:255',
            'sender_contact' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Complaint::create($validated);

        return back()->with('success', 'Aduan berhasil dikirim dan akan segera diproses.');
    }
}
