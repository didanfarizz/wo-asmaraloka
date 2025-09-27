<x-layouts.admin-layout title="Katalog Produk">

    <div class="flex justify-end mb-6">
        <a href="{{ route('admin.katalog.create') }}"
            class="px-6 py-2 bg-[#795F48] text-white font-semibold rounded-lg shadow-md 
                   hover:bg-[#AE8563] hover:text-black transition duration-300 flex items-center">
            Tambah Data
        </a>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-xl border border-stone-200 overflow-x-auto">
        <table class="min-w-full divide-y divide-stone-200">
            <thead class="bg-stone-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-bold text-stone-600 uppercase tracking-wider">No</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-stone-600 uppercase tracking-wider">Gambar</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-stone-600 uppercase tracking-wider">Nama Paket
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-stone-600 uppercase tracking-wider">Harga</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-stone-600 uppercase tracking-wider">Deskripsi
                    </th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-stone-600 uppercase tracking-wider">Aksi
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-stone-200">
                @forelse ($katalog as $item)
                    <tr>
                        <td class="px-6 py-4 text-sm text-stone-500">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4">
                            @if ($item->image)
                                <img src="{{ asset('images/' . $item->image) }}"
                                    alt="{{ $item->package_name }}" class="w-20 h-20 object-cover rounded">
                            @else
                                -
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm font-medium text-stone-900">{{ $item->package_name }}</td>
                        <td class="px-6 py-4 text-sm text-amber-700 font-semibold">
                            Rp{{ number_format($item->price, 0, ',', '.') }}</td>
                        <td class="px-6 py-4 text-sm text-stone-500 max-w-xs truncate">{{ $item->description }}</td>
                        <td class="px-6 py-4 text-center space-x-2">
                            <a href="{{ route('admin.katalog.edit', $item->catalogue_id) }}"
                                class="inline-block px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">Edit</a>

                            <form action="{{ route('admin.katalog.destroy', $item->catalogue_id) }}" method="POST"
                                class="inline-block"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus paket ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-4 py-2 text-white bg-red-600 rounded-lg hover:bg-red-700">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-sm text-stone-500">Belum ada katalog.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</x-layouts.admin-layout>
