<x-layouts.app title="Form Pemesanan {{ $item->package_name }}">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        <h2 class="text-3xl font-bold text-stone-800 mb-6">Form Pemesanan: {{ $item->package_name }}</h2>

        <form action="{{ route('pesan.store', $item->catalogue_id) }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block mb-1 font-medium">Nama Pemesan</label>
                <input type="text" name="name" required
                    class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:ring-amber-300">
            </div>

            <div>
                <label class="block mb-1 font-medium">Email</label>
                <input type="email" name="email" required
                    class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:ring-amber-300">
            </div>

            <div>
                <label class="block mb-1 font-medium">Telepon</label>
                <input type="text" name="phone" required
                    class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:ring-amber-300">
            </div>

            <div>
                <label class="block mb-1 font-medium">Tanggal Acara</label>
                <input type="date" name="event_date" required
                    class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:ring-amber-300">
            </div>

            <button type="submit" class="px-4 py-2 bg-amber-700 text-white rounded hover:bg-amber-800">
                Kirim Pesanan
            </button>
        </form>
    </div>
</x-layouts.app>
