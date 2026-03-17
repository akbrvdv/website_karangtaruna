<x-app-layout>
    <x-slot name="header">
        Layanan Aduan Warga
    </x-slot>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h2 class="text-lg font-bold text-gray-800">Daftar Kotak Masuk</h2>
                <p class="text-sm text-gray-500">Baca dan kelola aspirasi, usulan, serta laporan dari warga.</p>
            </div>
            
            <div class="bg-blue-50 text-blue-700 px-4 py-2 rounded-xl font-semibold text-sm border border-blue-100">
                Total Aduan: {{ $complaints->count() ?? 0 }}
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100 text-xs uppercase tracking-wider text-gray-500 font-semibold">
                        <th class="p-4 pl-6 w-16 text-center">No</th>
                        <th class="p-4 w-1/4">Pengirim & Tanggal</th>
                        <th class="p-4 w-1/2">Isi Aduan / Laporan</th>
                        <th class="p-4 text-center w-32">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm">
                    @forelse($complaints ?? [] as $complaint)
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="p-4 pl-6 text-center text-gray-500 align-top">{{ $loop->iteration }}</td>
                            
                            <td class="p-4 align-top">
                                <div class="font-bold text-gray-900 mb-1">
                                    {{ $complaint->name ? $complaint->name : 'Warga (Anonim)' }}
                                </div>
                                <div class="text-xs text-gray-500 flex items-center gap-1">
                                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    {{ $complaint->created_at->format('d M Y, H:i') }}
                                </div>
                            </td>
                            
                            <td class="p-4 align-top">
                                <h4 class="text-blue-700 font-bold mb-1">{{ $complaint->title }}</h4>
                                <p class="text-gray-600 text-sm leading-relaxed whitespace-pre-line">
                                    {{ $complaint->description }}
                                </p>
                            </td>
                            
                            <td class="p-4 align-top">
                                <div class="flex items-center justify-center">
                                    <form action="{{ route('admin.complaints.destroy', $complaint->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin laporan ini sudah diselesaikan dan ingin dihapus?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="flex items-center gap-2 bg-red-50 text-red-600 hover:bg-red-600 hover:text-white px-3 py-2 rounded-lg transition text-xs font-semibold border border-red-100 hover:border-red-600">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                            Selesai
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-12 text-center text-gray-500">
                                <div class="flex flex-col items-center justify-center">
                                    <div class="w-16 h-16 bg-green-50 text-green-500 rounded-full flex items-center justify-center mb-4">
                                        <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    </div>
                                    <h3 class="text-lg font-bold text-gray-800 mb-1">Kotak Masuk Kosong</h3>
                                    <p class="text-sm">Saat ini belum ada aduan atau usulan baru dari warga.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>