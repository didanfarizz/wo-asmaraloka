<x-layouts.admin-layout title="Laporan Pemesanan">

    <div class="bg-white p-6 rounded-xl shadow-xl border border-stone-200">

        <h1 class="text-2xl font-bold mb-6">Laporan Pemesanan</h1>

        {{-- Form Filter --}}
        <form action="{{ route('admin.laporan') }}" method="GET" class="flex flex-col md:flex-row gap-4 mb-6">
            <div>
                <label>Status</label>
                <select name="status" class="px-3 py-2 border rounded w-full">
                    <option value="">Semua</option>
                    <option value="requested" {{ request('status') == 'requested' ? 'selected' : '' }}>Requested</option>
                    <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Approved</option>
                </select>
            </div>

            <div>
                <label>Dari Tanggal</label>
                <input type="date" name="from" value="{{ request('from') }}"
                    class="px-3 py-2 border rounded w-full">
            </div>

            <div>
                <label>Sampai Tanggal</label>
                <input type="date" name="to" value="{{ request('to') }}"
                    class="px-3 py-2 border rounded w-full">
            </div>

            <div class="flex items-end">
                <button type="submit" class="px-4 py-2 bg-amber-700 text-white rounded hover:bg-amber-800">
                    Filter
                </button>
            </div>
        </form>

        {{-- Tabel Laporan --}}
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-stone-200">
                <thead class="bg-stone-50">
                    <tr>
                        <th class="px-6 py-3 text-left">No</th>
                        <th class="px-6 py-3 text-left">Nama Pemesan</th>
                        <th class="px-6 py-3 text-left">Paket</th>
                        <th class="px-6 py-3 text-left">Tanggal Acara</th>
                        <th class="px-6 py-3 text-left">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $index => $order)
                        <tr>
                            <td class="px-6 py-4">{{ $index + 1 }}</td>
                            <td class="px-6 py-4">{{ $order->name }}</td>
                            <td class="px-6 py-4">{{ $order->catalogue->package_name ?? '-' }}</td>
                            <td class="px-6 py-4">{{ \Carbon\Carbon::parse($order->wedding_date)->format('d M Y') }}
                            </td>
                            <td class="px-6 py-4 capitalize">{{ $order->status }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-stone-500">Tidak ada data.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

</x-layouts.admin-layout>
