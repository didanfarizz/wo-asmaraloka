<x-layouts.admin-layout title="Daftar Pesanan">

    {{-- Header Halaman --}}
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-stone-800">Manajemen Pemesanan</h1>
        <p class="text-stone-500 mt-1">
            Lihat dan kelola semua permintaan pesanan yang masuk ke sistem LUVIRA.
        </p>
    </div>

    {{-- Kartu Utama untuk Tabel --}}
    <div class="bg-white p-8 rounded-2xl shadow-xl">

        <h2 class="text-2xl font-semibold text-stone-800 mb-6 border-b pb-4">Semua Transaksi Pesanan</h2>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-stone-200">
                <thead class="bg-stone-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-stone-600 uppercase tracking-wider rounded-tl-lg">No</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-stone-600 uppercase tracking-wider">Nama Pemesan</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-stone-600 uppercase tracking-wider">Paket</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-stone-600 uppercase tracking-wider">Tgl. Acara</th>
                        <th class="px-6 py-4 text-center text-xs font-bold text-stone-600 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-center text-xs font-bold text-stone-600 uppercase tracking-wider rounded-tr-lg">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-100">
                    @forelse ($orders as $index => $order)
                        <tr class="hover:bg-amber-50 transition duration-150">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-stone-900">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-stone-700 font-semibold">{{ $order->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-stone-600">{{ $order->catalogue->package_name ?? 'Custom' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-stone-600">
                                <i class="far fa-calendar-alt mr-1 text-[#A0522D]"></i>
                                {{ \Carbon\Carbon::parse($order->wedding_date)->format('d F Y') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                @php
                                    // Status yang lebih terdefinisi dan warna yang disesuaikan
                                    $statusColor = match ($order->status) {
                                        'requested' => 'bg-yellow-100 text-yellow-800',
                                        'approved' => 'bg-green-100 text-green-800',
                                        'rejected' => 'bg-red-100 text-red-800',
                                        default => 'bg-stone-100 text-stone-600',
                                    };
                                @endphp
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-bold rounded-full capitalize {{ $statusColor }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>

                            <td class="flex gap-2 justify-center py-3 px-6 whitespace-nowrap">

                                {{-- Tombol Approve/Setujui --}}
                                @if ($order->status != 'approved')
                                    <form action="{{ route('admin.pemesanan.approve', $order->order_id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                            class="text-white bg-green-500 hover:bg-green-600 p-2 rounded-lg transition duration-300"
                                            title="Setujui Pesanan">
                                            Approve
                                        </button>
                                    </form>
                                @else
                                    {{-- Tampilan non-aktif untuk status 'approved' --}}
                                    <span class="text-green-500/50 p-2 rounded-lg cursor-not-allowed" title="Sudah Disetujui">
                                        <i class="fas fa-check"></i>
                                    </span>
                                @endif

                                {{-- Tombol Hapus --}}
                                <form action="{{ route('admin.pemesanan.destroy', $order->order_id) }}" method="POST"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesanan ini secara permanen?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                        class="text-white bg-red-500 hover:bg-red-600 p-2 rounded-lg transition duration-300"
                                        title="Hapus Pesanan">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-10 text-center text-lg text-stone-500 italic">
                                <i class="fas fa-box-open mr-2"></i> Tidak ada pesanan yang ditemukan saat ini.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        {{-- Paginasi (Jika ada) --}}
        <div class="mt-6">
            {{-- {{ $orders->links() }} --}}
        </div>

    </div>

</x-layouts.admin-layout>