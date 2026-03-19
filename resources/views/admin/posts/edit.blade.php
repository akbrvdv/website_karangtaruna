<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Berita & Kegiatan') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" class="p-6 space-y-6">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="sm:col-span-2">
                        <label for="title" class="block text-sm font-medium text-gray-700">Judul Berita *</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" required 
                            class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm px-4 py-3">
                    </div>

                    <div class="sm:col-span-2">
                        <label for="category" class="block text-sm font-medium text-gray-700">Kategori *</label>
                        <select id="category" name="category" required 
                            class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm px-4 py-3 bg-white">
                            <option value="Opini" {{ old('category', $post->category) == 'Opini' ? 'selected' : '' }}>Opini</option>
                            <option value="Kegiatan" {{ old('category', $post->category) == 'Kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                            <option value="Berita" {{ old('category', $post->category) == 'Berita' ? 'selected' : '' }}>Berita</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label for="content" class="block text-sm font-medium text-gray-700">Isi Konten *</label>
                    <textarea id="content" name="content" rows="10" required 
                        class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm px-4 py-3">{{ old('content', $post->content) }}</textarea>
                </div>

                <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-50">
                    <a href="{{ route('admin.posts.index') }}" class="px-5 py-2.5 text-sm font-medium text-gray-700 bg-gray-100 rounded-xl hover:bg-gray-200 transition">Batal</a>
                    <button type="submit" class="px-5 py-2.5 text-sm font-bold text-white bg-blue-600 rounded-xl hover:bg-blue-700 shadow-md transition">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>