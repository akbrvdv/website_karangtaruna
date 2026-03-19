<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Pengurus - Tunas Muda</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased bg-white flex min-h-screen">
    
    <div class="hidden lg:flex lg:w-1/2 bg-gradient-to-tr from-blue-900 via-indigo-800 to-blue-700 items-center justify-center p-12 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
        <div class="relative z-10 text-center text-white max-w-lg">
            <div class="w-24 h-24 bg-white text-blue-900 rounded-3xl flex items-center justify-center text-4xl font-extrabold mx-auto mb-8 shadow-2xl transform rotate-3 hover:rotate-0 transition duration-300">
                TM
            </div>
            <h1 class="text-4xl font-extrabold mb-4 leading-tight">Mari Bergabung<br>Bersama Kami!</h1>
            <p class="text-blue-100 text-lg leading-relaxed">Daftarkan diri Anda sebagai bagian dari pengelola sistem Karang Taruna "Tunas Muda".</p>
        </div>
    </div>

    <div class="w-full lg:w-1/2 flex items-center justify-center p-8 sm:p-12 bg-gray-50">
        <div class="w-full max-w-md bg-white p-10 rounded-3xl shadow-xl border border-gray-100">
            
            <div class="lg:hidden text-center mb-8">
                <div class="w-16 h-16 bg-blue-900 text-white rounded-2xl flex items-center justify-center text-2xl font-extrabold mx-auto mb-4 shadow-lg">
                    TM
                </div>
            </div>

            <div class="mb-8 text-center lg:text-left">
                <h2 class="text-3xl font-extrabold text-gray-900 mb-2">Buat Akun Baru 🚀</h2>
                <p class="text-gray-500 font-medium">Lengkapi data di bawah untuk akses Admin.</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                <div>
                    <label for="name" class="block text-sm font-bold text-gray-700 mb-2">Nama Lengkap</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus placeholder="Contoh: Budi Santoso" class="block w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 px-4 py-3 bg-gray-50 transition">
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500" />
                </div>

                <div>
                    <label for="email" class="block text-sm font-bold text-gray-700 mb-2">Alamat Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required placeholder="email@contoh.com" class="block w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 px-4 py-3 bg-gray-50 transition">
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
                </div>

                <div>
                    <label for="password" class="block text-sm font-bold text-gray-700 mb-2">Password</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password" placeholder="Minimal 8 karakter" class="block w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 px-4 py-3 bg-gray-50 transition">
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-bold text-gray-700 mb-2">Konfirmasi Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Ulangi password di atas" class="block w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 px-4 py-3 bg-gray-50 transition">
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500" />
                </div>

                <button type="submit" class="w-full flex justify-center py-3.5 px-4 border border-transparent rounded-xl shadow-lg text-sm font-bold text-white bg-blue-600 hover:bg-blue-700 focus:outline-none transition transform hover:-translate-y-0.5 mt-4">
                    Daftar Sekarang
                </button>
            </form>
            
            <p class="mt-8 text-center text-sm text-gray-500 font-medium">
                Sudah punya akun? 
                <a href="{{ route('login') }}" class="font-bold text-blue-600 hover:text-blue-700 transition">Masuk di sini</a>
            </p>
        </div>
    </div>

</body>
</html>