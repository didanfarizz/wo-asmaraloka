<x-layouts.admin-layout title="Dashboard">

    {{-- Kartu Ringkasan --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">

        {{-- Total Paket --}}
        <div class="bg-white p-6 rounded-xl shadow-lg border-l-4 border-amber-600">
            <p class="text-sm font-medium text-stone-500 uppercase">Total Paket</p>
            <p class="text-3xl font-bold text-stone-800 mt-1">{{ $totalPaket }}</p>
            <span class="text-xs text-amber-700">termasuk Custom Package</span>
        </div>

        {{-- Pesanan Baru --}}
        <div class="bg-white p-6 rounded-xl shadow-lg border-l-4 border-yellow-500">
            <p class="text-sm font-medium text-stone-500 uppercase">Pesanan Baru</p>
            <p class="text-3xl font-bold text-yellow-700 mt-1">{{ $pesananBaru }}</p>
            <span class="text-xs text-stone-500">Menunggu Verifikasi</span>
        </div>

        {{-- Pesanan Disetujui --}}
        <div class="bg-white p-6 rounded-xl shadow-lg border-l-4 border-green-600">
            <p class="text-sm font-medium text-stone-500 uppercase">Pendapatan</p>
            <p class="text-3xl font-bold text-green-700 mt-1">Rp {{ number_format($pesananDisetujui, 0, ',', '.') }}</p>
            <span class="text-xs text-stone-500">Tahun Ini</span>
        </div>
    </div>

    {{-- Aktivitas Pesanan Terbaru --}}
    <div class="bg-white p-8 rounded-xl shadow-xl">
        <h2 class="text-2xl font-semibold text-stone-800 mb-4">Aktivitas Pesanan Terbaru</h2>

        <table class="min-w-full divide-y divide-stone-200">
            <thead class="bg-stone-50">
                <tr>
                    <th class="px-6 py-3 text-left">No</th>
                    <th class="px-6 py-3 text-left">Nama Paket</th>
                    <th class="px-6 py-3 text-left">Nama Pemesan</th>
                    <th class="px-6 py-3 text-left">Tanggal Pernikahan</th>
                    <th class="px-6 py-3 text-left">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($recentOrders as $index => $order)
                    <tr>
                        <td class="px-6 py-4">{{ $index + 1 }}</td>
                        <td class="px-6 py-4">{{ $order->catalogue->name ?? '-' }}</td>
                        <td class="px-6 py-4">{{ $order->customer_name }}</td>
                        <td class="px-6 py-4">{{ \Carbon\Carbon::parse($order->wedding_date)->format('d M Y') }}</td>
                        <td class="px-6 py-4 capitalize">{{ $order->status }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-stone-500">Belum ada pesanan</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</x-layouts.admin-layout>
