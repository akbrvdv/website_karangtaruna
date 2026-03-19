@extends('layouts.public')

@section('content')
<style>
    ::-webkit-scrollbar {
        display: none;
    }
    html, body {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>

<div class="bg-[#111827] py-20 text-center text-white">
    <h1 class="text-4xl font-extrabold mb-4">Susunan Pengurus Karang Taruna</h1>
    <p class="text-gray-300 text-lg">Mengenal lebih dekat para pemuda penggerak lingkungan.</p>
</div>

<div class="bg-white py-16 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            
            @forelse($committees as $committee)
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-8 flex flex-col items-center justify-center text-center">
                    
                    <div class="w-32 h-32 rounded-full overflow-hidden mb-6 border-4 border-white shadow-sm flex items-center justify-center bg-blue-100">
                        @if ($committee->image)
                            <img src="{{ Storage::url($committee->image) }}" alt="{{ $committee->name }}" class="w-full h-full object-cover">
                        @else
                            @php
                                $initials = collect(explode(' ', $committee->name))->map(function($word) { return strtoupper(substr($word, 0, 1)); })->take(2)->join('');
                            @endphp
                            <span class="text-4xl font-medium text-blue-800">{{ $initials }}</span>
                        @endif
                    </div>
                    
                    <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $committee->name }}</h3>
                    <span class="inline-block px-4 py-1 bg-blue-50 text-blue-600 rounded-full text-sm font-medium">
                        {{ $committee->position }}
                    </span>
                </div>
            @empty
                <div class="col-span-full text-center text-gray-500 py-12">
                    Belum ada data pengurus yang dipublikasikan.
                </div>
            @endforelse

        </div>
    </div>
</div>
@endsection