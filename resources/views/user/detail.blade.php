<x-layouts.app title="{{ $item->package_name }}">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        <div class="flex flex-col md:flex-row gap-10">
            {{-- Gambar Paket --}}
            <div class="md:w-1/2">
                <img src="{{ asset('images/' . $item->image) }}" alt="{{ $item->package_name }}" class="rounded shadow">
            </div>

            {{-- Detail & Form Pemesanan --}}
            <div class="md:w-1/2">
                <h2 class="text-3xl font-bold text-stone-800 mb-4">{{ $item->package_name }}</h2>
                <p class="text-amber-700 font-semibold mb-2">Rp{{ number_format($item->price, 0, ',', '.') }}</p>
                <p class="text-stone-500 mb-6">{{ $item->description }}</p>

                <h3 class="text-xl font-semibold mb-3">Form Pemesanan</h3>
                <form action="{{ route('pesan.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <input type="hidden" name="catalogue_id" value="{{ $item->catalogue_id }}">

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
        </div>
    </div>
</x-layouts.app>
