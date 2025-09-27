<x-layouts.admin-layout title="Katalog Produk">

    <div class="flex justify-end mb-6">
        {{-- Tombol Tambah Data (Static Link) --}}
        <a href="/admin/katalog/create"
            class="px-6 py-2 bg-amber-700 text-white font-semibold rounded-lg shadow-md 
                  hover:bg-amber-800 transition duration-300 flex items-center">
            Tambah Data
        </a>
    </div>

    {{-- Kotak Tabel Data --}}
    <div class="bg-white p-6 rounded-xl shadow-xl border border-stone-200 overflow-x-auto">
        <table class="min-w-full divide-y divide-stone-200">
            <thead class="bg-stone-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-bold text-stone-600 uppercase tracking-wider">No</th>
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

                {{-- Contoh Static Data --}}
                <tr>
                    <td class="px-6 py-4 text-sm text-stone-500">1</td>
                    <td class="px-6 py-4 text-sm font-medium text-stone-900">Paket Silver</td>
                    <td class="px-6 py-4 text-sm text-amber-700 font-semibold">Rp10.000.000</td>
                    <td class="px-6 py-4 text-sm text-stone-500 max-w-xs truncate">Paket sederhana dengan dekorasi
                        minimalis.</td>
                    <td class="px-6 py-4 text-center space-x-2">
                        <a href="/admin/katalog/1/edit"
                            class="inline-block px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">Edit</a>
                        <form action="/admin/katalog/1" method="POST" class="inline-block"
                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus paket ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="px-4 py-2 text-white bg-red-600 rounded-lg hover:bg-red-700">Hapus</button>
                        </form>
                    </td>
                </tr>

                <tr>
                    <td class="px-6 py-4 text-sm text-stone-500">2</td>
                    <td class="px-6 py-4 text-sm font-medium text-stone-900">Paket Gold</td>
                    <td class="px-6 py-4 text-sm text-amber-700 font-semibold">Rp25.000.000</td>
                    <td class="px-6 py-4 text-sm text-stone-500 max-w-xs truncate">Paket mewah dengan dekorasi premium.
                    </td>
                    <td class="px-6 py-4 text-center space-x-2">
                        <a href="/admin/katalog/2/edit"
                            class="inline-block px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">Edit</a>
                        <form action="/admin/katalog/2" method="POST" class="inline-block"
                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus paket ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="px-4 py-2 text-white bg-red-600 rounded-lg hover:bg-red-700">Hapus</button>
                        </form>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>

</x-layouts.admin-layout>
