<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Committee;
use App\Models\Complaint;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user'])->latest()->take(3)->get();
        return view('public.home', compact('posts'));
    }

    public function sejarah()
    {
        return view('public.sejarah');
    }

    public function pengurus()
    {
        $committees = Committee::oldest()->get();
        return view('public.pengurus', compact('committees'));
    }

    public function blogCategory($slug)
    {
        $categoryName = ucfirst($slug); // Mengubah 'opini' jadi 'Opini'
        $posts = Post::where('category', $categoryName)
                     ->with(['user'])
                     ->latest()
                     ->paginate(9);
        
        $pageTitle = 'Kategori: ' . $categoryName;
        return view('public.blog', compact('posts', 'pageTitle'));
    }

    public function aduan()
    {
        return view('public.aduan');
    }

    public function storeAduan(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Complaint::create([
            'name' => $request->name,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'Aduan berhasil dikirim!');
    }
    
    public function showPost($id)
    {
        // Mencari berita berdasarkan ID beserta data usernya
        $post = Post::with(['user'])->findOrFail($id);
        
        // Memanggil file detail.blade.php di dalam folder public
        return view('public.detail', compact('post'));
    }
}