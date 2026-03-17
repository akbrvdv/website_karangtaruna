<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <style>
        /* Sembunyikan scrollbar untuk Chrome, Safari dan Opera */
        ::-webkit-scrollbar {
            display: none;
            width: 0px;
            background: transparent;
        }
        /* Sembunyikan scrollbar untuk IE, Edge dan Firefox */
        html, body, * {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }
    </style>
</head>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Admin Karang Taruna') }} - Dashboard</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </head>
    <body class="font-sans antialiased text-gray-900 bg-gray-50" x-data="{ sidebarOpen: false }">
        <div class="flex h-screen overflow-hidden">
            
            @include('layouts.navigation')

            <div class="flex-1 flex flex-col overflow-hidden">
                
                <header class="bg-white shadow-sm z-10">
                    <div class="flex items-center justify-between px-6 py-4">
                        <div class="flex items-center">
                            <button @click="sidebarOpen = true" class="text-gray-500 hover:text-gray-700 lg:hidden focus:outline-none">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                                </svg>
                            </button>
                            
                            @if (isset($header))
                                <h2 class="font-semibold text-xl text-gray-800 leading-tight ml-4 lg:ml-0">
                                    {{ $header }}
                                </h2>
                            @endif
                        </div>

                        <div class="flex items-center relative" x-data="{ profileOpen: false }">
                            <button @click="profileOpen = !profileOpen" class="flex items-center gap-2 focus:outline-none transition hover:opacity-80">
                                <span class="text-sm font-medium text-gray-700 hidden sm:block">{{ Auth::user()->name }}</span>
                                
                                @if(Auth::user()->profile_photo)
                                    <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}" alt="Profile" class="w-10 h-10 rounded-full object-cover border-2 border-blue-100 shadow-sm">
                                @else
                                    <div class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold shadow-sm">
                                        {{ substr(Auth::user()->name, 0, 1) }}
                                    </div>
                                @endif
                            </button>

                            <div x-show="profileOpen" @click.away="profileOpen = false" class="absolute right-0 top-12 mt-2 w-48 bg-white rounded-md shadow-lg py-1 ring-1 ring-black ring-opacity-5" style="display: none;">
                                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition">Profil Saya</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition">Log Out</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </header>

                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50 p-6">
                    {{ $slot }}
                </main>

            </div>
        </div>
    </body>
</html>