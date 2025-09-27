<x-layouts.admin-layout title="Dashboard">

    {{-- Kontainer untuk Kartu Ringkasan (Kardus) --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">

        {{-- Kartu 1: Total Paket --}}
        <div class="bg-white p-6 rounded-xl shadow-lg border-l-4 border-amber-600">
            <p class="text-sm font-medium text-stone-500 uppercase">Total Paket</p>
            {{-- Data Statik (Ganti dengan data dari Controller) --}}
            <p class="text-3xl font-bold text-stone-800 mt-1">45</p>
            <span class="text-xs text-amber-700">termasuk Custom Package</span>
        </div>

        {{-- Kartu 2: Pesanan Baru (Menunggu Verifikasi) --}}
        <div class="bg-white p-6 rounded-xl shadow-lg border-l-4 border-yellow-500">
            <p class="text-sm font-medium text-stone-500 uppercase">Pesanan Baru</p>
            {{-- Data Statik (Ganti dengan data dari Controller) --}}
            <p class="text-3xl font-bold text-yellow-700 mt-1">12</p>
            <span class="text-xs text-stone-500">Menunggu Verifikasi</span>
        </div>

        {{-- Kartu 3: Total Pendapatan --}}
        <div class="bg-white p-6 rounded-xl shadow-lg border-l-4 border-green-600">
            <p class="text-sm font-medium text-stone-500 uppercase">Pesanan Disetujui</p>
            {{-- Data Statik (Ganti dengan data dari Controller) --}}
            <p class="text-3xl font-bold text-green-700 mt-1">Rp 120 Juta</p>
            <span class="text-xs text-stone-500">Tahun Ini</span>
        </div>
    </div>

    {{-- Bagian Konten Tambahan (misal: Grafik/Tabel Terbaru) --}}
    <div class="bg-white p-8 rounded-xl shadow-xl">
        <h2 class="text-2xl font-semibold text-stone-800 mb-4">Aktivitas Pesanan Terbaru</h2>
        <p class="text-stone-600">Tabel pesanan yang baru saja diajukan...</p>
        {{-- Implementasikan tabel data di sini --}}
    </div>

</x-layouts.admin-layout>
