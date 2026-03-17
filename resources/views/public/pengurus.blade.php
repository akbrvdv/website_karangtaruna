@extends('layouts.public')

@section('title', 'Susunan Pengurus')

@section('content')
<div class="bg-gray-900 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-3xl font-extrabold text-white sm:text-4xl">Susunan Pengurus Karang Taruna</h1>
        <p class="mt-4 text-xl text-gray-300">Mengenal lebih dekat para pemuda penggerak lingkungan.</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    @if(isset($committees) && $committees->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($committees as $pengurus)
                <div class="bg-white rounded-2xl p-6 text-center shadow hover:shadow-lg transition-shadow duration-300 border border-gray-100 group">
                    <div class="w-32 h-32 mx-auto rounded-full bg-blue-100 border-4 border-white shadow-md overflow-hidden mb-4 relative">
                        @if($pengurus->photo)
                            <img src="{{ asset('storage/' . $pengurus->photo) }}" alt="{{ $pengurus->name }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        @else
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($pengurus->name) }}&background=bfdbfe&color=1e3a8a&size=150" alt="{{ $pengurus->name }}" class="w-full h-full object-cover">
                        @endif
                    </div>
                    
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-blue-700 transition-colors">{{ $pengurus->name }}</h3>
                    <p class="text-blue-600 font-medium text-sm mt-1 bg-blue-50 inline-block px-3 py-1 rounded-full">{{ $pengurus->position }}</p>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-16 bg-white rounded-2xl shadow-sm border border-gray-100">
            <svg class="mx-auto h-12 w-12 text-gray-300 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
            <p class="text-gray-500">Data susunan pengurus belum ditambahkan.</p>
        </div>
    @endif
</div>
@endsection