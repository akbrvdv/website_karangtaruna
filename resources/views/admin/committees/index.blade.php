<x-app-layout>
    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Daftar Pengurus</h2>
                <p class="text-gray-500 text-sm mt-1">Kelola data anggota dan struktur organisasi Karang Taruna.</p>
            </div>
            <a href="{{ route('admin.committees.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-xl font-bold text-sm shadow-md transition flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                Tambah Pengurus
            </a>
        </div>

        @if(session('success'))
            <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-5 py-4 rounded-xl relative flex items-center gap-3">
                <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span class="block sm:inline font-bold">{{ session('success') }}</span>
            </div>
        @endif

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100 p-6">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-100 text-xs font-bold text-gray-500 uppercase tracking-wider">
                            <th class="p-4 text-center w-16">NO</th>
                            <th class="p-4">PROFIL PENGURUS</th>
                            <th class="p-4">JABATAN</th>
                            <th class="p-4 text-center w-32">AKSI</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($committees as $index => $committee)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="p-4 text-center text-gray-500 font-medium">{{ $index + 1 }}</td>
                                <td class="p-4">
                                    <div class="flex items-center gap-4">
                                        <div class="h-14 w-14 rounded-full overflow-hidden bg-gray-200 shrink-0 border border-gray-200 shadow-sm">
                                            @if ($committee->image)
                                                <img src="{{ Storage::url($committee->image) }}" alt="Foto" class="w-full h-full object-cover">
                                            @else
                                                <img src="https://ui-avatars.com/api/?name={{ urlencode($committee->name) }}&background=bfdbfe&color=1e3a8a&size=200" alt="Avatar" class="w-full h-full object-cover">
                                            @endif
                                        </div>
                                        <div class="font-bold text-gray-900 text-base leading-tight">{{ $committee->name }}</div>
                                    </div>
                                </td>
                                <td class="p-4">
                                    <span class="px-3 py-1 bg-green-50 text-green-600 rounded-full text-xs font-bold border border-green-100 uppercase tracking-wide">
                                        {{ $committee->position }}
                                    </span>
                                </td>
                                <td class="p-4">
                                    <div class="flex justify-center gap-2">
                                        <a href="{{ route('admin.committees.edit', $committee->id) }}" class="p-2 text-amber-600 hover:bg-amber-50 rounded-lg transition" title="Edit">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                        </a>
                                        <form action="{{ route('admin.committees.destroy', $committee->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pengurus ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition" title="Hapus">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="p-12 text-center text-gray-500 font-medium">
                                    Belum ada data pengurus yang ditambahkan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>