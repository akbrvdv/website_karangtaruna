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
                <div class="bg-white rounded-2xl p-6 text-center shadow hover:shadow-lg transition-shadow border border-gray-100">
                    <div class="w-32 h-32 mx-auto rounded-full bg-blue-100 border-4 border-white shadow-md overflow-hidden mb-4">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($pengurus->name) }}&background=bfdbfe&color=1e3a8a&size=150" alt="{{ $pengurus->name }}" class="w-full h-full object-cover">
                    </div>
                    <h3 class="text-lg font-bold text-gray-900">{{ $pengurus->name }}</h3>
                    <p class="text-blue-600 font-medium text-sm mt-1">{{ $pengurus->position }}</p>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-16 text-gray-500">
            <p>Data susunan pengurus belum ditambahkan.</p>
        </div>
    @endif
</div>
@endsection