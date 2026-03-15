@extends('layouts.public')

@section('title', 'Berita & Kegiatan')

@section('content')
<div class="bg-blue-900 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-3xl font-extrabold text-white sm:text-4xl">Kabar Terbaru Karang Taruna</h1>
        <p class="mt-4 text-xl text-blue-200">Informasi seputar kegiatan, program kerja, dan pengumuman warga.</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    @if($posts->isEmpty())
        <div class="text-center py-20 bg-white rounded-2xl shadow-sm border border-gray-200">
            <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l6 6v10a2 2 0 01-2 2z" />
            </svg>
            <h3 class="mt-4 text-lg font-medium text-gray-900">Belum ada berita</h3>
            <p class="mt-1 text-gray-500">Berita dan kegiatan akan segera dipublikasikan di sini.</p>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($posts as $post)
                <article class="bg-white rounded-2xl shadow hover:shadow-xl transition duration-300 overflow-hidden border border-gray-100 flex flex-col">
                    <div class="h-52 bg-gray-200 w-full">
                        <img src="https://ui-avatars.com/api/?name=Berita+{{ $loop->iteration }}&background=bfdbfe&color=1e3a8a&size=500" alt="Cover" class="w-full h-full object-cover">
                    </div>
                    <div class="p-6 flex-1 flex flex-col">
                        <div class="flex items-center justify-between mb-3 text-sm">
                            <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-800 font-medium">
                                {{ $post->category->name ?? 'Umum' }}
                            </span>
                            <span class="text-gray-500">{{ $post->created_at->format('d M Y') }}</span>
                        </div>
                        <h2 class="text-xl font-bold text-gray-900 mb-2 line-clamp-2">{{ $post->title }}</h2>
                        <p class="text-gray-600 mb-4 flex-1 line-clamp-3">
                            {{ Str::limit(strip_tags($post->content), 150) }}
                        </p>
                        <div class="border-t border-gray-100 pt-4 flex items-center justify-between">
                            <span class="text-sm font-medium text-gray-700">Oleh: {{ $post->user->name ?? 'Admin' }}</span>
                            <button class="text-blue-600 font-semibold hover:text-blue-800 text-sm">Baca Lengkap &rarr;</button>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
        
        <div class="mt-10">
            {{ $posts->links() }}
        </div>
    @endif
</div>
@endsection