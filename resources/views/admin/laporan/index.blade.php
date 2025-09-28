<x-layouts.admin-layout title="Laporan Pesanan">

    {{-- Header Halaman --}}
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-stone-800">Laporan Pemesanan</h1>
        <p class="text-stone-500 mt-1">Buat, filter, dan unduh data pesanan untuk analisis kinerja.</p>
    </div>

    {{-- Kartu Filter dan Aksi --}}
    <div class="bg-white p-6 rounded-2xl shadow-lg mb-8 border border-stone-100">

        <h2 class="text-xl font-semibold text-stone-800 mb-4 flex items-center">
            <i class="fas fa-filter text-amber-600 mr-2"></i> Filter Laporan
        </h2>

        {{-- Form Filter --}}
        <form action="{{ route('admin.laporan') }}" method="GET" class="grid grid-cols-2 md:grid-cols-5 gap-4 items-end">
            
            {{-- Filter Status --}}
            <div>
                <label for="status" class="block mb-1 font-semibold text-sm text-stone-700">Status</label>
                <select name="status" id="status" 
                    class="w-full px-4 py-2 border border-stone-300 rounded-lg focus:ring-amber-500 focus:border-amber-500">
                    <option value="">Semua Status</option>
                    <option value="requested" {{ request('status') == 'requested' ? 'selected' : '' }}>Requested</option>
                    <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Approved</option>
                    <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
                </select>
            </div>

            {{-- Filter Dari Tanggal --}}
            <div>
                <label for="from" class="block mb-1 font-semibold text-sm text-stone-700">Dari Tanggal</label>
                <input type="date" id="from" name="from" value="{{ request('from') }}"
                    class="w-full px-4 py-2 border border-stone-300 rounded-lg focus:ring-amber-500 focus:border-amber-500">
            </div>

            {{-- Filter Sampai Tanggal --}}
            <div>
                <label for="to" class="block mb-1 font-semibold text-sm text-stone-700">Sampai Tanggal</label>
                <input type="date" id="to" name="to" value="{{ request('to') }}"
                    class="w-full px-4 py-2 border border-stone-300 rounded-lg focus:ring-amber-500 focus:border-amber-500">
            </div>

            {{-- Tombol Aksi --}}
            <div class="col-span-2 flex gap-3">
                <button type="submit" 
                    class="w-full px-4 py-2 bg-[#A0522D] text-white font-semibold rounded-lg hover:bg-[#8D4829] transition duration-300">
                    <i class="fas fa-search mr-1"></i> Filter Data
                </button>
                
                {{-- Tombol Unduh Laporan --}}
                <a href="{{ route('admin.laporan', array_merge(request()->query(), ['export' => 'true'])) }}"
                    class="w-full px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-300 flex items-center justify-center">
                    <i class="fas fa-download mr-1"></i> Unduh
                </a>
            </div>
        </form>

    </div>

    {{-- Kartu Tabel Laporan --}}
    <div class="bg-white p-8 rounded-2xl shadow-xl">
        <h2 class="text-2xl font-semibold text-stone-800 mb-6 border-b pb-3">Hasil Laporan</h2>

        {{-- Tabel Laporan --}}
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-stone-200">
                <thead class="bg-stone-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-stone-600 uppercase tracking-wider rounded-tl-lg">No</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-stone-600 uppercase tracking-wider">Nama Pemesan</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-stone-600 uppercase tracking-wider">Paket</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-stone-600 uppercase tracking-wider">Tgl. Acara</th>
                        <th class="px-6 py-4 text-center text-xs font-bold text-stone-600 uppercase tracking-wider rounded-tr-lg">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-100">
                    @forelse ($orders as $index => $order)
                        <tr class="hover:bg-amber-50 transition duration-150">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-stone-900">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-stone-700 font-semibold">{{ $order->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-stone-600">{{ $order->catalogue->package_name ?? 'Custom' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-stone-600">
                                {{ \Carbon\Carbon::parse($order->wedding_date)->format('d F Y') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                @php
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
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-10 text-lg text-stone-500 italic">
                                <i class="fas fa-exclamation-triangle mr-2"></i> Tidak ada data laporan yang sesuai dengan filter.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        {{-- Tombol Cetak/PDF (Opsional) --}}
        <div class="mt-6 flex justify-end">
            {{-- Contoh tombol cetak --}}
            <button onclick="window.print()" class="px-6 py-2 bg-stone-500 text-white font-semibold rounded-lg hover:bg-stone-600 transition duration-300">
                <i class="fas fa-print mr-1"></i> Cetak Laporan
            </button>
        </div>
    </div>

</x-layouts.admin-layout>