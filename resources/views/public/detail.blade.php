@extends('layouts.public')

@section('title', $post->title)

@section('content')
<div class="bg-gray-50 py-16 min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <a href="{{ url()->previous() }}" class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800 font-bold mb-8 transition transform hover:-translate-x-1">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali
        </a>

        <div class="bg-white rounded-t-3xl border border-gray-100 shadow-sm p-8 sm:p-12 pb-8">
            <div class="flex items-center gap-3 mb-6">
                <span class="px-4 py-1.5 bg-blue-50 text-blue-700 rounded-full text-sm font-bold uppercase tracking-wide">{{ $post->category ?? 'Informasi Umum' }}</span>
                <span class="text-sm text-gray-500 font-medium">{{ $post->created_at->format('d F Y') }}</span>
            </div>
            
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-gray-900 leading-tight mb-6">{{ $post->title }}</h1>
            
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold uppercase">
                    {{ substr($post->user->name ?? 'A', 0, 1) }}
                </div>
                <span class="text-gray-600 font-medium">Oleh: <span class="text-gray-900 font-bold">{{ $post->user->name ?? 'Admin' }}</span></span>
            </div>
        </div>

        @if($post->image)
        <div class="w-full h-64 sm:h-96 bg-gray-200 border-x border-gray-100 overflow-hidden">
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
        </div>
        @endif

        <div class="bg-white rounded-b-3xl border border-gray-100 shadow-sm p-8 sm:p-12 pt-8">
            <div class="prose prose-lg prose-blue max-w-none text-gray-700 leading-relaxed">
                {!! nl2br(e($post->content)) !!} 
            </div>
        </div>

    </div>
</div>
@endsection