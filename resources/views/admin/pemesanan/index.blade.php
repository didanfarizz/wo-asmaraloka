<x-layouts.admin-layout title="Pemesanan">

    <div class="bg-white p-6 rounded-xl shadow-xl border border-stone-200 overflow-x-auto">
        <table class="min-w-full divide-y divide-stone-200">
            <thead class="bg-stone-50">
                <tr>
                    <th class="px-6 py-3 text-left">No</th>
                    <th class="px-6 py-3 text-left">Nama Pemesan</th>
                    <th class="px-6 py-3 text-left">Paket</th>
                    <th class="px-6 py-3 text-left">Tanggal Acara</th>
                    <th class="px-6 py-3 text-left">Status</th>
                    <th class="px-6 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $index => $order)
                    <tr>
                        <td class="px-6 py-4">{{ $index + 1 }}</td>
                        <td class="px-6 py-4">{{ $order->name }}</td>
                        <td class="px-6 py-4">{{ $order->catalogue->package_name ?? '-' }}</td>
                        <td class="px-6 py-4">{{ \Carbon\Carbon::parse($order->wedding_date)->format('d M Y') }}</td>
                        <td class="px-6 py-4 capitalize">{{ $order->status }}</td>
                        <td class="px-6 py-4">
                            <span
                                class="px-3 py-1 rounded-full text-white font-semibold
        {{ $order->status == 'requested' ? 'bg-yellow-400' : '' }}
        {{ $order->status == 'approved' ? 'bg-green-600' : '' }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td class="flex gap-2 justify-center py-3">
                            {{-- Tombol Approve --}}
                            <form action="{{ route('admin.pemesanan.approve', $order->order_id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit"
                                    class="px-3 py-1 rounded 
                   {{ $order->status == 'approved' ? 'bg-gray-400 cursor-not-allowed' : 'bg-green-600 hover:bg-green-700 text-white' }}"
                                    {{ $order->status == 'approved' ? 'disabled' : '' }}>
                                    Approve
                                </button>
                            </form>

                            {{-- Tombol Hapus --}}
                            <form action="{{ route('admin.pemesanan.destroy', $order->order_id) }}" method="POST"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesanan ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                                    Hapus
                                </button>
                            </form>
                        </td>



                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-layouts.admin-layout>
