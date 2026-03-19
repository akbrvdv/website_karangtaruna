@extends('layouts.public')

@section('title', 'Layanan Aduan Warga')

@section('content')
<div class="bg-blue-900 py-16 text-center text-white">
    <h1 class="text-3xl font-extrabold sm:text-4xl">Layanan Aduan Warga</h1>
    <p class="mt-4 text-xl text-blue-200">Sampaikan aspirasi, usulan, atau laporan Anda di sini.</p>
</div>

<div class="max-w-3xl mx-auto px-4 py-12">
    @if(session('success'))
        <div class="mb-8 bg-green-50 border border-green-200 text-green-700 px-6 py-4 rounded-2xl flex items-center gap-3 shadow-sm">
            <svg class="w-6 h-6 text-green-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <span class="font-bold text-lg">{{ session('success') }}</span>
        </div>
    @endif

    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8">
        <form action="{{ route('aduan.store') }}" method="POST" class="space-y-6">
            @csrf <div>
                <label for="name" class="block text-sm font-bold text-gray-700">Nama Lengkap (Opsional)</label>
                <p class="text-xs text-gray-500 mb-2">Kosongkan jika ingin melapor secara anonim (rahasia).</p>
                <input type="text" name="name" id="name" class="block w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 px-4 py-3 bg-gray-50">
            </div>

            <div>
                <label for="title" class="block text-sm font-bold text-gray-700 mb-2">Judul Laporan / Usulan *</label>
                <input type="text" name="title" id="title" required placeholder="Contoh: Lampu Jalan Padam di RT 02" class="block w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 px-4 py-3 bg-gray-50">
            </div>

            <div>
                <label for="description" class="block text-sm font-bold text-gray-700 mb-2">Isi Pesan *</label>
                <textarea name="description" id="description" rows="6" required placeholder="Ceritakan detail aduan atau usulan Anda di sini..." class="block w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 px-4 py-3 bg-gray-50"></textarea>
            </div>

            <button type="submit" class="w-full flex justify-center py-3.5 px-4 border border-transparent rounded-xl shadow-md text-sm font-bold text-white bg-blue-600 hover:bg-blue-700 transition">
                Kirim Aduan Sekarang
            </button>
        </form>
    </div>
</div>
@endsection