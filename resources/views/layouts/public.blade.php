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
<body class="bg-gray-50 text-gray-900 font-sans flex flex-col min-h-screen">

    <nav class="bg-white shadow-sm sticky top-0 z-50" x-data="{ mobileMenu: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                
                <div class="flex items-center gap-3 shrink-0">
                    <img src="{{ Storage::url('logo.png') }}" alt="Logo Karang Taruna" class="w-12 h-12 object-contain shrink-0">
                    <a href="{{ route('home') }}" class="flex flex-col justify-center">
                        <span class="font-bold text-lg text-blue-900 leading-tight whitespace-nowrap">Tunas Muda</span>
                        <span class="text-xs font-semibold text-gray-500 uppercase tracking-widest whitespace-nowrap">Ngumpul Wetan</span>
                    </a>
                </div>

                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="text-sm font-bold text-gray-700 hover:text-blue-600 transition">Home</a>
                    
                    <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                        <button class="flex items-center gap-1 text-sm font-bold text-gray-700 hover:text-blue-600 py-2 transition">
                            Blog <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="open" x-cloak class="absolute left-0 w-40 bg-white border border-gray-100 rounded-lg shadow-lg py-2">
                            <a href="{{ route('blog.category', 'opini') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition">Opini</a>
                            <a href="{{ route('blog.category', 'kegiatan') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition">Kegiatan</a>
                            <a href="{{ route('blog.category', 'berita') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition">Berita</a>
                        </div>
                    </div>

                    <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                        <button class="flex items-center gap-1 text-sm font-bold text-gray-700 hover:text-blue-600 py-2 transition">
                            Profile <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="open" x-cloak class="absolute left-0 w-56 bg-white border border-gray-100 rounded-lg shadow-lg py-2">
                            <a href="{{ route('profil.sejarah') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition">Sejarah</a>
                            <a href="{{ route('pengurus.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition">Susunan Kepengurusan</a>
                        </div>
                    </div>

                    <a href="{{ route('aduan.index') }}" class="bg-blue-600 text-white px-5 py-2 rounded-full font-bold text-sm hover:bg-blue-700 transition whitespace-nowrap shrink-0 shadow-md">
                        Kirim Aduan
                    </a>
                </div>

                <div class="flex items-center md:hidden shrink-0">
                    <button @click="mobileMenu = !mobileMenu" class="text-gray-500 hover:text-blue-600 transition">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div x-show="mobileMenu" x-cloak class="md:hidden bg-white border-t border-gray-100 p-4 transition duration-300">
            <a href="{{ route('home') }}" class="block py-2 font-bold text-gray-700">Home</a>
            <div class="py-2"><span class="font-bold text-gray-400 text-xs uppercase">Blog</span></div>
            <a href="{{ route('blog.category', 'opini') }}" class="block py-2 pl-4 text-gray-600 hover:text-blue-600 transition">Opini</a>
            <a href="{{ route('blog.category', 'kegiatan') }}" class="block py-2 pl-4 text-gray-600 hover:text-blue-600 transition">Kegiatan</a>
            <a href="{{ route('blog.category', 'berita') }}" class="block py-2 pl-4 text-gray-600 hover:text-blue-600 transition">Berita</a>
            <div class="py-2 mt-2"><span class="font-bold text-gray-400 text-xs uppercase">Profile</span></div>
            <a href="{{ route('profil.sejarah') }}" class="block py-2 pl-4 text-gray-600 hover:text-blue-600 transition">Sejarah</a>
            <a href="{{ route('pengurus.index') }}" class="block py-2 pl-4 text-gray-600 hover:text-blue-600 transition">Susunan Kepengurusan</a>
            <a href="{{ route('aduan.index') }}" class="block mt-4 text-center bg-blue-600 text-white py-3 rounded-lg font-bold transition shadow-md">Kirim Aduan</a>
        </div>
    </nav>

    <main class="flex-grow">
        @yield('content')
    </main>

    <footer class="bg-gray-900 pt-16 pb-8 border-t border-gray-800 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-12">
                
                <div>
                    <div class="flex items-center gap-3 mb-6">
                        <img src="{{ Storage::url('logo.png') }}" alt="Logo Karang Taruna" class="w-10 h-10 object-contain bg-white rounded-lg p-1">
                        <span class="text-white font-bold text-xl tracking-tight">Tunas Muda</span>
                    </div>
                    <p class="text-gray-400 text-sm leading-relaxed mb-6">
                        Wadah pembinaan dan pengembangan generasi muda. Kami berkomitmen untuk terus berinovasi dan berkontribusi nyata bagi kemajuan sosial dan lingkungan masyarakat Desa Ngumpul Wetan.
                    </p>
                </div>

                <div>
                    <h3 class="text-white font-bold text-lg mb-6 uppercase tracking-wider">Hubungi Kami</h3>
                    <ul class="space-y-4 text-gray-400 text-sm">
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-blue-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <span>Sekretariat Karang Taruna,<br>Desa Ngumpul Wetan, Kec. ... ,<br>Kabupaten ... , Kode Pos ...</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-blue-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            <span>+62 812-3456-7890</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-blue-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            <span>admin@tunasmuda.com</span>
                        </li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-white font-bold text-lg mb-6 uppercase tracking-wider">Sosial Media</h3>
                    <p class="text-gray-400 text-sm mb-4">Ikuti kegiatan terbaru kami di platform sosial media:</p>
                    <div class="flex gap-3">
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center text-gray-400 hover:bg-blue-600 hover:text-white transition shadow-sm">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" /></svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center text-gray-400 hover:bg-blue-600 hover:text-white transition shadow-sm">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center text-gray-400 hover:bg-blue-600 hover:text-white transition shadow-sm">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M19.812 5.418c.861.23 1.538.907 1.768 1.768C21.998 8.746 22 12 22 12s0 3.255-.418 4.814a2.504 2.504 0 0 1-1.768 1.768c-1.56.419-7.814.419-7.814.419s-6.255 0-7.814-.419a2.505 2.505 0 0 1-1.768-1.768C2 15.255 2 12 2 12s0-3.255.417-4.814a2.507 2.507 0 0 1 1.768-1.768C5.744 5 11.998 5 11.998 5s6.255 0 7.814.418ZM15.194 12 10 15V9l5.194 3Z" clip-rule="evenodd"/></svg>
                        </a>
                    </div>
                </div>

            </div>
            
            <div class="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-xs text-gray-500">
                <p>&copy; {{ date('Y') }} Karang Taruna "Tunas Muda". All rights reserved.</p>
                <p>Karang Taruna "Tunas Muda" Desa Ngumpul Wetan</p>
            </div>
        </div>
    </footer>
</body>
</html>