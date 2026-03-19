<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin - Tunas Muda</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased bg-white flex min-h-screen">
    
    <div class="hidden lg:flex lg:w-1/2 bg-gradient-to-br from-blue-900 via-blue-800 to-indigo-900 items-center justify-center p-12 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
        <div class="relative z-10 text-center text-white max-w-lg">
            <div class="w-24 h-24 bg-white text-blue-900 rounded-3xl flex items-center justify-center text-4xl font-extrabold mx-auto mb-8 shadow-2xl transform -rotate-3 hover:rotate-0 transition duration-300">
                TM
            </div>
            <h1 class="text-4xl font-extrabold mb-4 leading-tight">Sinergi Pemuda<br><span class="text-blue-300">Membangun Desa</span></h1>
            <p class="text-blue-100 text-lg leading-relaxed">Selamat datang di Portal Manajemen Karang Taruna "Tunas Muda" Ngumpul Wetan. Silakan masuk untuk mengelola konten dan aspirasi warga.</p>
        </div>
    </div>

    <div class="w-full lg:w-1/2 flex items-center justify-center p-8 sm:p-12 bg-gray-50">
        <div class="w-full max-w-md bg-white p-10 rounded-3xl shadow-xl border border-gray-100">
            
            <div class="lg:hidden text-center mb-8">
                <div class="w-16 h-16 bg-blue-900 text-white rounded-2xl flex items-center justify-center text-2xl font-extrabold mx-auto mb-4 shadow-lg">
                    TM
                </div>
                <h2 class="text-2xl font-bold text-gray-900">Tunas Muda</h2>
            </div>

            <div class="mb-10 text-center lg:text-left">
                <h2 class="text-3xl font-extrabold text-gray-900 mb-2">Login Admin 🔒</h2>
                <p class="text-gray-500 font-medium">Silakan masukkan kredensial pengurus Anda.</p>
            </div>

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-bold text-gray-700 mb-2">Alamat Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="admin@example.com" class="block w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 px-4 py-3 bg-gray-50 transition">
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
                </div>

                <div>
                    <label for="password" class="block text-sm font-bold text-gray-700 mb-2">Password</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="••••••••" class="block w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 px-4 py-3 bg-gray-50 transition">
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
                </div>

                <button type="submit" class="w-full flex justify-center py-3.5 px-4 border border-transparent rounded-xl shadow-lg text-sm font-bold text-white bg-blue-600 hover:bg-blue-700 focus:outline-none transition transform hover:-translate-y-0.5 mt-8">
                    Masuk ke Dashboard
                </button>
            </form>

        </div>
    </div>

</body>
</html>