<x-layouts.admin-layout title="Manajemen Pengaturan">

    {{-- Header Halaman dan Tombol Aksi --}}
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-4xl font-bold text-stone-800">Manajemen Pengaturan</h1>
            <p class="text-stone-500 mt-1">Kelola data konfigurasi situs LUVIRA.</p>
        </div>
        
        {{-- Tombol Tambah Data --}}
        <a href="{{ route('admin.settings.create') }}"
            class="px-6 py-3 bg-green-600 text-white font-bold rounded-lg shadow-lg 
                    hover:bg-green-700 transition duration-300 transform hover:scale-[1.02] flex items-center space-x-2">
            <i class="fas fa-plus-circle text-lg"></i>
            <span>Tambah Setting Baru</span>
        </a>
    </div>
    
    {{-- Kartu Utama untuk Tabel --}}
    <div class="bg-white p-8 rounded-2xl shadow-xl">

        <h2 class="text-2xl font-semibold text-stone-800 mb-6 border-b pb-4">Daftar Konfigurasi Tersimpan</h2>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-stone-200">
                <thead class="bg-stone-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-stone-600 uppercase tracking-wider rounded-tl-lg w-10">No</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-stone-600 uppercase tracking-wider">Nomor Telepon</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-stone-600 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-4 text-center text-xs font-bold text-stone-600 uppercase tracking-wider rounded-tr-lg w-32">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-100">
                    @forelse ($settings as $index => $setting)
                        <tr class="hover:bg-amber-50 transition duration-150">
                            {{-- No --}}
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-stone-900">{{ $index + 1 }}</td>
                            
                            {{-- Phone --}}
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-stone-700">
                                <i class="fas fa-phone-alt text-amber-600 mr-2"></i>
                                {{ $setting->phone_number }}
                            </td>
                            
                            {{-- Email --}}
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-stone-700">
                                <i class="fas fa-envelope text-amber-600 mr-2"></i>
                                {{ $setting->email }}
                            </td>
                            
                            {{-- Aksi --}}
                            <td class="flex gap-2 justify-center py-3 px-6 whitespace-nowrap">
                                
                                {{-- Tombol Edit --}}
                                <a href="{{ route('admin.settings.edit', $setting->setting_id) }}"
                                   class="p-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600 transition duration-300 inline-flex items-center"
                                   title="Edit Pengaturan">
                                    Edit
                                </a>

                                {{-- Tombol Hapus --}}
                                <form action="{{ route('admin.settings.destroy', $setting->setting_id) }}" method="POST"
                                    class="inline-block"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus konfigurasi ini? Ini dapat memengaruhi kontak website.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="p-2 text-white bg-red-500 rounded-lg hover:bg-red-600 transition duration-300 inline-flex items-center"
                                        title="Hapus Pengaturan">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-10 text-center text-lg text-stone-500 italic">
                                <i class="fas fa-tools mr-2"></i> Belum ada data pengaturan yang ditambahkan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
    </div>

</x-layouts.admin-layout>