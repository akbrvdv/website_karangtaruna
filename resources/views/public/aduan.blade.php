@extends('layouts.public')

@section('title', 'Layanan Aduan')

@section('content')
<div class="bg-blue-50 py-12 sm:py-20">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-10">
            <h1 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">Layanan Aduan Warga</h1>
            <p class="mt-4 text-lg text-gray-600">Sampaikan aspirasi, kritik, usulan, atau laporan terkait lingkungan kita di sini.</p>
        </div>

        <div class="bg-white py-8 px-6 shadow-xl rounded-2xl sm:px-10 border border-gray-100">
            
            @if(session('success'))
                <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded-md">
                    <div class="flex items-center">
                        <svg class="h-6 w-6 text-green-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <p class="text-sm text-green-700 font-medium">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            <form action="{{ route('aduan.store') }}" method="POST" class="space-y-6">
                @csrf
                
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap (Opsional)</label>
                    <div class="mt-1">
                        <input type="text" name="name" id="name" placeholder="Boleh dikosongkan jika ingin anonim" class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                </div>

                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Judul Aduan <span class="text-red-500">*</span></label>
                    <div class="mt-1">
                        <input type="text" name="title" id="title" required placeholder="Contoh: Usulan Kegiatan Kerja Bakti" class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        @error('title')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi / Detail Laporan <span class="text-red-500">*</span></label>
                    <div class="mt-1">
                        <textarea id="description" name="description" rows="5" required placeholder="Jelaskan aduan atau usulan Anda secara detail..." class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea>
                        @error('description')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-bold text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition">
                        Kirim Aduan
                    </button>
                    <p class="mt-3 text-center text-xs text-gray-500">Aduan Anda akan diteruskan secara rahasia kepada admin/pengurus.</p>
                </div>
            </form>
        </div>
        
    </div>
</div>
@endsection