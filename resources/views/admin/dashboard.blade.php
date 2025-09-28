<x-layouts.admin-layout title="Dashboard">

    {{-- Header Dashboard Modern --}}
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-stone-800">Ringkasan Sistem</h1>
        <p class="text-stone-500 mt-1">
            Selamat datang kembali, admin. Berikut adalah metrik dan aktivitas terbaru LUVIRA.
        </p>
    </div>

    {{-- Kartu Metrik (Info Boxes) - Redesain Total --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">

        {{-- 1. Total Paket (Catalogue) --}}
        <div class="bg-white p-8 rounded-2xl shadow-xl border-t-8 border-t-[#A0522D] flex items-center justify-between transition duration-300 hover:shadow-2xl">
            <div>
                <p class="text-lg font-medium text-stone-500 uppercase tracking-wider">Total Paket</p>
                <p class="text-5xl font-extrabold text-[#5A4737] mt-2">{{ $totalPaket }}</p>
                <span class="text-sm text-amber-700 mt-1 block">Termasuk Custom Package</span>
            </div>
            <div class="p-4 bg-amber-100 rounded-full text-[#A0522D]">
                <i class="fas fa-box-full text-3xl"></i> {{-- Menggunakan ikon yang lebih spesifik --}}
            </div>
        </div>

        {{-- 2. Pesanan Baru (Pending/New Orders) --}}
        <div class="bg-white p-8 rounded-2xl shadow-xl border-t-8 border-t-yellow-500 flex items-center justify-between transition duration-300 hover:shadow-2xl">
            <div>
                <p class="text-lg font-medium text-stone-500 uppercase tracking-wider">Pesanan Baru</p>
                <p class="text-5xl font-extrabold text-yellow-700 mt-2">{{ $pesananBaru }}</p>
                <span class="text-sm text-stone-500 mt-1 block">Menunggu Verifikasi</span>
            </div>
            <div class="p-4 bg-yellow-100 rounded-full text-yellow-600">
                <i class="fas fa-clipboard-list text-3xl"></i>
            </div>
        </div>

        {{-- 3. Pendapatan (Revenue) --}}
        <div class="bg-white p-8 rounded-2xl shadow-xl border-t-8 border-t-green-600 flex items-center justify-between transition duration-300 hover:shadow-2xl">
            <div>
                <p class="text-lg font-medium text-stone-500 uppercase tracking-wider">Pendapatan</p>
                <p class="text-5xl font-extrabold text-green-700 mt-2">Rp {{ number_format($pesananDisetujui, 0, ',', '.') }}</p>
                <span class="text-sm text-stone-500 mt-1 block">Tahun Ini</span>
            </div>
            <div class="p-4 bg-green-100 rounded-full text-green-600">
                <i class="fas fa-wallet text-3xl"></i>
            </div>
        </div>
    </div>

    {{-- Aktivitas Pesanan Terbaru - Tampilan Tabel Ditingkatkan --}}
    <div class="bg-white p-8 rounded-2xl shadow-xl">
        <h2 class="text-3xl font-semibold text-stone-800 mb-6">Aktivitas Pesanan Terbaru</h2>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-stone-200">
                <thead class="bg-stone-50 border-b border-stone-200">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-stone-600 uppercase tracking-wider rounded-tl-lg">No</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-stone-600 uppercase tracking-wider">Nama Paket</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-stone-600 uppercase tracking-wider">Nama Pemesan</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-stone-600 uppercase tracking-wider">Tgl. Pernikahan</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-stone-600 uppercase tracking-wider rounded-tr-lg">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-100">
                    @forelse ($recentOrders as $index => $order)
                        <tr class="hover:bg-stone-50 transition duration-150">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-stone-900">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-stone-600 font-semibold">{{ $order->catalogue->name ?? 'Paket Custom' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-stone-600">{{ $order->customer_name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-stone-600">
                                <i class="far fa-calendar-alt mr-1 text-amber-600"></i>
                                {{ \Carbon\Carbon::parse($order->wedding_date)->format('d F Y') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @php
                                    $statusClass = [
                                        'pending' => 'bg-yellow-100 text-yellow-800',
                                        'disetujui' => 'bg-green-100 text-green-800',
                                        'ditolak' => 'bg-red-100 text-red-800',
                                        // Tambahkan status lain jika ada
                                    ][$order->status] ?? 'bg-stone-100 text-stone-800';
                                @endphp
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full capitalize {{ $statusClass }}">
                                    {{ $order->status }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-10 text-center text-lg text-stone-500 italic">
                                <i class="far fa-bell-slash mr-2"></i> Belum ada aktivitas pesanan terbaru.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="mt-6 text-right">
            <a href="{{ route('admin.pemesanan.index') }}" class="text-sm font-semibold text-[#A0522D] hover:text-[#5A4737] transition duration-300">
                Lihat Semua Pesanan &rarr;
            </a>
        </div>
    </div>

</x-layouts.admin-layout>