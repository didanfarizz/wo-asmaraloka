<x-layouts.admin-layout title="Manajemen Pemesanan">

    {{-- Kotak Tabel Data --}}
    <div class="bg-white p-6 rounded-xl shadow-xl border border-stone-200 overflow-x-auto">

        {{-- Header dengan Tombol Tambah Data (Jika Admin bisa membuat pesanan) --}}
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-stone-800">Daftar Pemesanan Pelanggan</h2>
            {{-- Tombol Tambah Data (Dipertahankan dari mockup, meskipun pemesanan biasanya dari sisi user) --}}
            <a href="#" {{-- Ganti dengan route admin.pemesanan.create jika ada --}}
                class="px-6 py-2 bg-amber-700 text-white font-semibold rounded-lg shadow-md 
                      hover:bg-amber-800 transition duration-300">
                Tambah Data
            </a>
        </div>

        {{-- Pesan Status (Jika ada verifikasi berhasil) --}}
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <table class="min-w-full divide-y divide-stone-200">
            <thead class="bg-stone-50">
                <tr>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-bold text-stone-600 uppercase tracking-wider">
                        Nama & ID
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-bold text-stone-600 uppercase tracking-wider">
                        Email
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-bold text-stone-600 uppercase tracking-wider">
                        Paket yang Dipilih
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-bold text-stone-600 uppercase tracking-wider">
                        Status
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-center text-xs font-bold text-stone-600 uppercase tracking-wider">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-stone-200">

                {{-- Loop Data Pemesanan dari Controller --}}
                @forelse ($pemesanan as $pesan)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-stone-500">
                            <div class="text-sm font-medium text-stone-900">{{ $pesan->user->name ?? 'N/A' }}</div>
                            <div class="text-xs text-stone-400">#{{ $pesan->id }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-stone-500">
                            {{ $pesan->user->username ?? 'N/A' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-amber-700">
                            {{ $pesan->katalog->nama_paket ?? 'Paket Dihapus' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @php
                                $statusClass =
                                    [
                                        'Menunggu Verifikasi' => 'bg-yellow-100 text-yellow-800',
                                        'Disetujui' => 'bg-green-100 text-green-800',
                                        'Dibatalkan' => 'bg-red-100 text-red-800',
                                    ][$pesan->status] ?? 'bg-gray-100 text-gray-800';
                            @endphp
                            <span
                                class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusClass }}">
                                {{ $pesan->status }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">

                            {{-- Tombol Approve (Hanya Tampil jika status = Menunggu Verifikasi) --}}
                            @if ($pesan->status == 'Menunggu Verifikasi')
                                <form action="{{ route('admin.pemesanan.verifikasi', $pesan->id) }}" method="POST"
                                    class="inline-block">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit"
                                        class="px-4 py-2 text-white bg-green-600 rounded-lg hover:bg-green-700 transition duration-150 shadow-md">
                                        Approve
                                    </button>
                                </form>
                            @else
                                <a href="{{ route('admin.pemesanan.show', $pesan->id) }}"
                                    class="text-stone-500 hover:text-stone-700">
                                    Lihat Detail
                                </a>
                            @endif

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-10 text-center text-stone-500 text-lg">
                            Tidak ada pemesanan yang tercatat saat ini.
                        </td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>

</x-layouts.admin-layout>
