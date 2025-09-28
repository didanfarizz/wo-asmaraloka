<x-layouts.admin-layout title="Manajemen Katalog">

    {{-- Header Halaman --}}
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-4xl font-bold text-stone-800">Katalog Produk</h1>
            <p class="text-stone-500 mt-1">Kelola semua paket dan layanan yang ditawarkan LUVIRA.</p>
        </div>
        
        {{-- Tombol Aksi Utama --}}
        <a href="{{ route('admin.katalog.create') }}"
            class="px-6 py-3 bg-[#A0522D] text-white font-bold rounded-lg shadow-lg 
                    hover:bg-[#8D4829] transition duration-300 transform hover:scale-[1.02] flex items-center space-x-2">
            <i class="fas fa-plus-circle text-lg"></i>
            <span>Tambah Paket Baru</span>
        </a>
    </div>
    
    {{-- Kartu Utama untuk Tabel --}}
    <div class="bg-white p-8 rounded-2xl shadow-xl">
        
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-stone-200">
                <thead class="bg-stone-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-stone-600 uppercase tracking-wider rounded-tl-lg w-10">No</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-stone-600 uppercase tracking-wider w-24">Gambar</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-stone-600 uppercase tracking-wider w-1/4">Nama Paket</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-stone-600 uppercase tracking-wider w-auto">Harga</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-stone-600 uppercase tracking-wider w-1/3">Deskripsi</th>
                        <th class="px-6 py-4 text-center text-xs font-bold text-stone-600 uppercase tracking-wider rounded-tr-lg w-20">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-stone-100">
                    @forelse ($katalog as $item)
                        <tr class="hover:bg-amber-50 transition duration-150">
                            {{-- No --}}
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-stone-900">{{ $loop->iteration }}</td>
                            
                            {{-- Gambar --}}
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if ($item->image)
                                    <img src="{{ asset('images/' . $item->image) }}"
                                        alt="{{ $item->package_name }}" class="w-14 h-14 object-cover rounded-md shadow-md">
                                @else
                                    <div class="w-14 h-14 bg-stone-200 rounded-md flex items-center justify-center text-xs text-stone-500">
                                        No Image
                                    </div>
                                @endif
                            </td>
                            
                            {{-- Nama Paket --}}
                            <td class="px-6 py-4 text-sm font-bold text-stone-800">{{ $item->package_name }}</td>
                            
                            {{-- Harga --}}
                            <td class="px-6 py-4 text-sm text-green-700 font-extrabold whitespace-nowrap">
                                <i class="fas fa-tag text-green-500 mr-1"></i>
                                Rp{{ number_format($item->price, 0, ',', '.') }}
                            </td>
                            
                            {{-- Deskripsi --}}
                            <td class="px-6 py-4 text-sm text-stone-600 max-w-sm truncate" title="{{ $item->description }}">
                                {{ \Illuminate\Support\Str::limit($item->description, 50, '...') }}
                            </td>
                            
                            {{-- Aksi --}}
                            <td class="px-6 py-4 whitespace-nowrap text-center space-x-1">
                                
                                {{-- Tombol Edit --}}
                                <a href="{{ route('admin.katalog.edit', $item->catalogue_id) }}"
                                    class="p-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600 transition duration-300 inline-flex items-center"
                                    title="Edit Data">
                                    Edit
                                </a>

                                {{-- Tombol Hapus --}}
                                <form action="{{ route('admin.katalog.destroy', $item->catalogue_id) }}" method="POST"
                                    class="inline-block"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus paket {{ $item->package_name }}?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="p-2 text-white bg-red-500 rounded-lg hover:bg-red-600 transition duration-300 inline-flex items-center"
                                        title="Hapus Data">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-10 text-center text-lg text-stone-500 italic">
                                <i class="fas fa-box-open mr-2"></i> Belum ada data katalog yang ditambahkan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.admin-layout>