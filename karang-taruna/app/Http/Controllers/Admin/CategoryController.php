<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name'
        ]);

        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        return back()->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function destroy(Category $category)
    {
        // Cegah penghapusan jika kategori masih dipakai di tabel posts
        if ($category->posts()->count() > 0) {
            return back()->withErrors('Tidak bisa menghapus kategori yang masih memiliki berita.');
        }
        
        $category->delete();
        return back()->with('success', 'Kategori berhasil dihapus!');
    }
}
