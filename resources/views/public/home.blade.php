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
                Selamat datang di portal resmi Karang Taruna "Tunas Muda" Ngumpul Wetan. Wadah kreativitas, inovasi, dan aspirasi generasi muda.
            </p>
            <div class="flex justify-center gap-4 flex-col sm:flex-row">
                <a href="{{ route('aduan.index') }}" class="bg-white text-blue-900 hover:bg-blue-50 px-8 py-3 rounded-full font-bold text-lg shadow-lg transition transform hover:-translate-y-1">
                    Buat Aduan Warga
                </a>
                <a href="#berita" class="border border-blue-300 text-blue-100 hover:bg-blue-800 hover:text-white px-8 py-3 rounded-full font-bold text-lg transition">
                    Kabar Terbaru
                </a>
            </div>
        </div>
    </section>

    <section id="berita" class="py-20 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl">Kabar & Kegiatan Terbaru</h2>
                <div class="mt-2 w-24 h-1 bg-blue-600 mx-auto rounded"></div>
            </div>

            @if($posts->isEmpty())
                <div class="text-center py-12 bg-white rounded-2xl shadow-sm border border-gray-100">
                    <p class="text-gray-500 text-lg">Belum ada berita terbaru saat ini.</p>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($posts as $post)
                        <a href="{{ route('blog.show', $post->id) }}" class="block bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 flex flex-col h-full transform hover:-translate-y-1">
                            
                            <div class="h-48 bg-gray-200 w-full shrink-0">
                                @if($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                                @else
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($post->title) }}&background=bfdbfe&color=1e3a8a&size=500" alt="Thumbnail" class="w-full h-full object-cover">
                                @endif
                            </div>
                            
                            <div class="p-6 flex flex-col flex-grow justify-between">
                                <div>
                                    <div class="flex items-center justify-between mb-3">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-blue-50 text-blue-700 uppercase tracking-wide">
                                            {{ $post->category ?? 'Informasi Umum' }}
                                        </span>
                                        <span class="text-xs text-gray-500 font-medium">
                                            {{ $post->created_at->format('d M Y') }}
                                        </span>
                                    </div>
                                    
                                    <h3 class="text-xl font-bold text-gray-900 mb-2 leading-tight line-clamp-2">
                                        {{ $post->title }}
                                    </h3>
                                    
                                    <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                                        {{ strip_tags($post->content) }}
                                    </p>
                                </div>
                                
                                <div class="flex items-center justify-between pt-4 border-t border-gray-100 mt-auto">
                                    <div class="flex items-center gap-2">
                                        <div class="w-6 h-6 rounded-full bg-blue-600 flex items-center justify-center text-xs font-bold text-white uppercase">
                                            {{ substr($post->user->name ?? 'A', 0, 1) }}
                                        </div>
                                        <span class="text-sm font-medium text-gray-700">{{ $post->user->name ?? 'Admin' }}</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
                
                <div class="mt-12 text-center">
                    <a href="{{ route('blog.category', 'berita') }}" class="inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-bold rounded-full text-blue-700 bg-blue-100 hover:bg-blue-200 transition">
                        Lihat Semua Berita
                    </a>
                </div>
            @endif
        </div>
    </section>

    <section class="bg-blue-600 py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-white mb-4">Punya Usulan atau Laporan Laporan?</h2>
            <p class="text-blue-100 mb-8 text-lg">Sampaikan aspirasi Anda melalui platform layanan aduan Karang Taruna kami.</p>
            <a href="{{ route('aduan.index') }}" class="inline-block bg-white text-blue-600 font-bold px-8 py-3 rounded-full shadow-lg hover:shadow-xl hover:scale-105 transition transform">
                Tulis Aduan Sekarang
            </a>
        </div>
    </section>
@endsection