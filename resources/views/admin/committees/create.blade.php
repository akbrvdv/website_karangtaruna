<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah Pengurus Baru</h2>
    </x-slot>

    <div class="py-12 max-w-3xl mx-auto sm:px-6 lg:px-8">
        <form action="{{ route('admin.committees.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 space-y-6">
            @csrf
            
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Nama Lengkap *</label>
                <input type="text" name="name" value="{{ old('name') }}" required autofocus placeholder="Contoh: Budi Santoso" class="w-full rounded-xl border-gray-300 focus:ring-blue-500 px-4 py-3 bg-gray-50 transition">
                @error('name') <p class="text-sm text-red-600 font-bold mt-1">❌ {{ $message }}</p> @enderror
            </div>
            
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Jabatan *</label>
                <input type="text" name="position" value="{{ old('position') }}" required placeholder="Contoh: Ketua Karang Taruna" class="w-full rounded-xl border-gray-300 focus:ring-blue-500 px-4 py-3 bg-gray-50 transition">
                @error('position') <p class="text-sm text-red-600 font-bold mt-1">❌ {{ $message }}</p> @enderror
            </div>
            
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Foto Profil (Opsional)</label>
                <input type="file" name="image" accept="image/png, image/jpeg, image/jpg" class="w-full rounded-xl border-gray-300 bg-gray-50 mb-2">
                <p class="text-xs text-gray-500 font-medium">Format: JPG, JPEG, PNG. Maksimal ukuran: 2 MB.</p>
                
                @error('image') <p class="text-sm text-red-600 font-bold mt-1">❌ {{ $message }}</p> @enderror
            </div>
            
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-50">
                <a href="{{ route('admin.committees.index') }}" class="px-5 py-2.5 text-sm font-medium text-gray-700 bg-gray-100 rounded-xl hover:bg-gray-200 transition">Batal</a>
                <button type="submit" class="px-5 py-2.5 text-sm font-bold text-white bg-blue-600 rounded-xl hover:bg-blue-700 shadow-md transition transform hover:-translate-y-0.5 flex items-center gap-2">
                    Simpan Pengurus
                </button>
            </div>
        </form>
    </div>
</x-app-layout>