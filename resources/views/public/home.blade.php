@extends('layouts.public')

@section('title', 'Selamat Datang')

@section('content')
    <section class="relative bg-gradient-to-br from-blue-900 via-blue-800 to-indigo-900 text-white py-24 sm:py-32 overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold tracking-tight mb-6">
                Sinergi Pemuda, <br class="hidden sm:block"> <span class="text-blue-400">Membangun Desa</span>
            </h1>
            <p class="mt-4 max-w-2xl mx-auto text-xl text-blue-100 mb-10">
                Selamat datang di portal resmi Karang Taruna. Wadah kreativitas, inovasi, dan aspirasi generasi muda untuk kemajuan lingkungan masyarakat.
            </p>
            <div class="flex justify-center gap-4 flex-col sm:flex-row">
                <a href="{{ route('aduan.index') }}" class="bg-white text-blue-900 hover:bg-blue-50 px-8 py-3 rounded-full font-bold text-lg shadow-lg transition transform hover:-translate-y-1">
                    Buat Aduan Warga
                </a>
                <a href="#berita" class="border border-blue-300 text-blue-100 hover:bg-blue-800 hover:text-white px-8 py-3 rounded-full font-bold text-lg transition">
                    Lihat Kabar Terbaru
                </a>
            </div>
        </div>
    </section>

    <section id="berita" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl">Kabar & Kegiatan Terbaru</h2>
                <div class="mt-2 w-24 h-1 bg-blue-600 mx-auto rounded"></div>
                <p class="mt-4 text-lg text-gray-600">Ikuti terus perkembangan dan program kerja yang sedang berjalan.</p>
            </div>

            @if($posts->isEmpty())
                <div class="text-center py-12 bg-white rounded-2xl shadow-sm border border-gray-100">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l6 6v10a2 2 0 01-2 2z" />
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada berita</h3>
                    <p class="mt-1 text-sm text-gray-500">Kabar terbaru akan segera hadir di sini.</p>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($posts as $post)
                        <article class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition-shadow duration-300 overflow-hidden border border-gray-100 flex flex-col">
                            <div class="h-48 bg-gray-200 w-full object-cover">
                                <img src="https://ui-avatars.com/api/?name=Berita+{{ $loop->iteration }}&background=bfdbfe&color=1e3a8a&size=500" alt="Thumbnail" class="w-full h-full object-cover">
                            </div>
                            <div class="p-6 flex-1 flex flex-col">
                                <div class="flex items-center justify-between mb-3">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        {{ $post->category->name ?? 'Informasi Umum' }}
                                    </span>
                                    <span class="text-xs text-gray-500 flex items-center gap-1">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        {{ $post->created_at->diffForHumans() ?? 'Baru saja' }}
                                    </span>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2 leading-tight">
                                    {{ $post->title }}
                                </h3>
                                <p class="text-gray-600 text-sm mb-4 flex-1">
                                    {{ \Illuminate\Support\Str::limit($post->content, 120) }}
                                </p>
                                <div class="flex items-center justify-between mt-auto pt-4 border-t border-gray-100">
                                    <div class="flex items-center gap-2">
                                        <div class="w-6 h-6 rounded-full bg-gray-300 flex items-center justify-center text-xs font-bold text-white uppercase">
                                            {{ substr($post->user->name ?? 'A', 0, 1) }}
                                        </div>
                                        <span class="text-sm font-medium text-gray-700">{{ $post->user->name ?? 'Admin' }}</span>
                                    </div>
                                    <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-semibold flex items-center gap-1">
                                        Baca <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
                
                <div class="mt-12 text-center">
                    <a href="{{ route('berita.index') }}" class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-full text-blue-700 bg-blue-100 hover:bg-blue-200 transition">
                        Lihat Semua Berita
                    </a>
                </div>
            @endif
        </div>
    </section>

    <section class="bg-blue-600 py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-white mb-4">Lingkungan Bermasalah? Ada Usulan Kegiatan?</h2>
            <p class="text-blue-100 mb-8 text-lg">Jangan ragu untuk menyampaikan aspirasi Anda melalui platform layanan aduan masyarakat kami.</p>
            <a href="{{ route('aduan.index') }}" class="inline-block bg-white text-blue-600 font-bold px-8 py-3 rounded-full shadow-lg hover:shadow-xl hover:scale-105 transition transform">
                Tulis Aduan Sekarang
            </a>
        </div>
    </section>
@endsection