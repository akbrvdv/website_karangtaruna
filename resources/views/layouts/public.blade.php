<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Karang Taruna Tunas Muda Ngumpul Wetan</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        ::-webkit-scrollbar { display: none; }
        html { scrollbar-width: none; }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-gray-50 text-gray-900 font-sans">

    <nav class="bg-white shadow-sm sticky top-0 z-50" x-data="{ mobileMenu: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center text-white font-bold text-xl">
                        TM
                    </div>
                    <a href="{{ route('home') }}" class="flex flex-col">
                        <span class="font-bold text-lg text-blue-900 leading-tight">Tunas Muda</span>
                        <span class="text-xs font-semibold text-gray-500 uppercase tracking-widest">Ngumpul Wetan</span>
                    </a>
                </div>

                <div class="hidden md:flex items-center space-x-6">
                    <a href="{{ route('home') }}" class="text-sm font-bold text-gray-700 hover:text-blue-600">Home</a>
                    
                    <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                        <button class="flex items-center gap-1 text-sm font-bold text-gray-700 hover:text-blue-600 py-2">
                            Blog <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="open" x-cloak class="absolute left-0 w-40 bg-white border border-gray-100 rounded-lg shadow-lg py-2">
                            <a href="{{ route('blog.category', 'opini') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600">Opini</a>
                            <a href="{{ route('blog.category', 'kegiatan') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600">Kegiatan</a>
                            <a href="{{ route('blog.category', 'berita') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600">Berita</a>
                        </div>
                    </div>

                    <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                        <button class="flex items-center gap-1 text-sm font-bold text-gray-700 hover:text-blue-600 py-2">
                            Profile <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="open" x-cloak class="absolute left-0 w-56 bg-white border border-gray-100 rounded-lg shadow-lg py-2">
                            <a href="{{ route('profil.sejarah') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600">Sejarah</a>
                            <a href="{{ route('pengurus.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600">Susunan Kepengurusan</a>
                        </div>
                    </div>

                    <a href="{{ route('aduan.index') }}" class="bg-blue-600 text-white px-5 py-2 rounded-full font-bold text-sm hover:bg-blue-700 transition">
                        Kirim Aduan
                    </a>
                </div>

                <div class="flex items-center md:hidden">
                    <button @click="mobileMenu = !mobileMenu" class="text-gray-500 hover:text-blue-600">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div x-show="mobileMenu" x-cloak class="md:hidden bg-white border-t border-gray-100 p-4">
            <a href="{{ route('home') }}" class="block py-2 font-bold text-gray-700">Home</a>
            <div class="py-2"><span class="font-bold text-gray-400 text-xs uppercase">Blog</span></div>
            <a href="{{ route('blog.category', 'opini') }}" class="block py-2 pl-4 text-gray-600">Opini</a>
            <a href="{{ route('blog.category', 'kegiatan') }}" class="block py-2 pl-4 text-gray-600">Kegiatan</a>
            <a href="{{ route('blog.category', 'berita') }}" class="block py-2 pl-4 text-gray-600">Berita</a>
            <div class="py-2 mt-2"><span class="font-bold text-gray-400 text-xs uppercase">Profile</span></div>
            <a href="{{ route('profil.sejarah') }}" class="block py-2 pl-4 text-gray-600">Sejarah</a>
            <a href="{{ route('pengurus.index') }}" class="block py-2 pl-4 text-gray-600">Susunan Kepengurusan</a>
            <a href="{{ route('aduan.index') }}" class="block mt-4 text-center bg-blue-600 text-white py-3 rounded-lg font-bold">Kirim Aduan</a>
        </div>
    </nav>

    <main class="min-h-screen">
        @yield('content')
    </main>

    <footer class="bg-gray-900 py-8 text-center text-gray-400 text-sm">
        &copy; {{ date('Y') }} Karang Taruna "Tunas Muda" Ngumpul Wetan.
    </footer>
</body>
</html>