@extends('layouts.public')

@section('title', $pageTitle)

@section('content')
<div class="bg-blue-900 py-16 text-center text-white">
    <h1 class="text-3xl font-extrabold sm:text-4xl">{{ $pageTitle }}</h1>
    <div class="mt-4 w-20 h-1 bg-blue-400 mx-auto rounded"></div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 min-h-screen">
    @if($posts->isEmpty())
        <div class="text-center py-16 bg-white rounded-2xl shadow-sm border border-gray-100">
            <svg class="mx-auto h-16 w-16 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l6 6v10a2 2 0 01-2 2z" />
            </svg>
            <p class="mt-4 text-gray-500 text-lg font-medium">Belum ada tulisan untuk kategori ini.</p>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($posts as $post)
                <article class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition-shadow duration-300 overflow-hidden border border-gray-100 flex flex-col h-full">
                    
                    <div class="h-48 bg-gray-200 w-full shrink-0">
                        @if($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                        @else
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($post->title) }}&background=bfdbfe&color=1e3a8a&size=500" alt="Cover Berita" class="w-full h-full object-cover">
                        @endif
                    </div>
                    
                    <div class="p-6 flex flex-col flex-grow">
                        <div class="flex items-center justify-between mb-3">
                            <span class="px-3 py-1 rounded-full text-xs font-bold bg-blue-50 text-blue-700">
                                {{ $post->category }}
                            </span>
                            <span class="text-xs text-gray-500 font-medium">
                                {{ $post->created_at->format('d M Y') }}
                            </span>
                        </div>
                        
                        <h2 class="text-xl font-bold text-gray-900 mb-2 line-clamp-2">
                            {{ $post->title }}
                        </h2>
                        
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3 flex-grow">
                            {{ strip_tags($post->content) }}
                        </p>
                        
                        <div class="border-t border-gray-100 pt-4 mt-auto">
                            <div class="flex items-center gap-2">
                                <div class="w-6 h-6 rounded-full bg-blue-600 flex items-center justify-center text-xs font-bold text-white uppercase">
                                    {{ substr($post->user->name ?? 'A', 0, 1) }}
                                </div>
                                <span class="text-sm font-medium text-gray-700">Oleh: {{ $post->user->name ?? 'Admin' }}</span>
                            </div>
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