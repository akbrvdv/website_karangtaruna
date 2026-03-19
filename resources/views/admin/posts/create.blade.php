<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Berita & Kegiatan') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-4 col-span-2">
                            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Judul *</label>
                            <input type="text" name="title" id="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div class="mb-4 col-span-2">
                            <label for="category" class="block text-gray-700 text-sm font-bold mb-2">Kategori *</label>
                            <select name="category" id="category" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                <option value="" disabled selected>-- Pilih Kategori --</option>
                                <option value="Opini">Opini</option>
                                <option value="Kegiatan">Kegiatan</option>
                                <option value="Berita">Berita</option>
                            </select>
                        </div>
                        <div class="mb-4 col-span-2">
                            <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Gambar</label>
                            <p class="text-xs text-gray-500 mb-2">Pilih file gambar untuk berita</p>
                            <input type="file" name="image" id="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4 col-span-2">
                            <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Isi Konten *</label>
                            <textarea name="content" id="content" rows="10" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required></textarea>
                        </div>
                    </div>
                    <div class="flex items-center justify-end">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Publikasikan Berita
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>