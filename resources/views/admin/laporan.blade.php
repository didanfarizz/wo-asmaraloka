</x-layouts.admin-layout title="Laporan Transaksi">

    <h2 class="text-2xl font-bold text-stone-800 mb-6">Ringkasan Transaksi (Periode: Tahun Ini)</h2>

    {{-- Kartu Ringkasan Keuangan --}}
    <div class="grid grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-5 rounded-xl shadow border-l-4 border-green-600">
            <p class="text-sm text-stone-500">Total Nilai Disetujui</p>
            <p class="text-3xl font-bold text-green-700">Rp{{ number_format($totalDisetujui, 0, ',', '.') }}</p>
        </div>
        <div class="bg-white p-5 rounded-xl shadow border-l-4 border-yellow-600">
            <p class="text-sm text-stone-500">Menunggu Verifikasi</p>
            <p class="text-3xl font-bold text-yellow-700">{{ $jumlahMenunggu }} Pesanan</p>
        </div>
        <div class="bg-white p-5 rounded-xl shadow border-l-4 border-red-600">
            <p class="text-sm text-stone-500">Total Dibatalkan</p>
            <p class="text-3xl font-bold text-red-700">{{ $jumlahDibatalkan }} Pesanan</p>
        </div>
    </div>

    {{-- Tabel Detail Transaksi --}}
    <div class="bg-white p-6 rounded-xl shadow-xl border border-stone-200 overflow-x-auto">
        <h3 class="text-xl font-semibold text-stone-800 mb-4">Detail Semua Pemesanan</h3>

        {{-- Tombol Cetak / Export --}}
        <div class="flex justify-end mb-4">
            <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Cetak /
                PDF</button>
        </div>

        {{-- Tabel akan diisi di sini --}}
        <table class="min-w-full divide-y divide-stone-200">
            {{-- ... Struktur tabel pemesanan, mirip dengan Pemesanan Index, tetapi lebih fokus pada nilai dan tanggal ... --}}
        </table>
    </div>

</x-layouts.admin-layout>
