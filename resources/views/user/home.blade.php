<x-layouts.app title="Beranda">
    {{-- Container untuk padding dan lebar maksimum --}}
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        {{-- Header Utama --}}
        <div class="text-center mb-16 pt-8">
            {{-- Mengganti nama brand menjadi Asmaraloka --}}
            <h1 class="text-5xl font-extrabold text-amber-700 tracking-wider font-serif">
                Asmaraloka
            </h1>
            {{-- Mengubah pink menjadi emas gelap (amber-700) --}}
            <p class="text-xl text-stone-700 mt-3 font-light">
                Wujudkan **Pernikahan Impianmu** dengan Sentuhan Elegan dan Hangat
            </p>
        </div>

        {{-- Bagian Paket Pernikahan --}}
        <h2
            class="text-3xl font-bold text-center text-stone-800 mb-10 border-b-2 border-amber-500 inline-block mx-auto pb-1">
            Paket Pernikahan Pilihan
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

            @forelse ($katalog as $item)
                <div class="bg-white p-4 rounded-lg shadow">
                    <img src="{{ asset('images/' . $item->image) }}" alt="{{ $item->package_name }}" class="mb-4 rounded">
                    <h3 class="text-lg font-bold">{{ $item->package_name }}</h3>
                    <p class="text-amber-700 font-semibold">Rp{{ number_format($item->price, 0, ',', '.') }}</p>
                    <p class="text-sm text-stone-500 mt-2">{{ $item->description }}</p>
                    <a href="{{ route('paket.show', $item->catalogue_id) }}"
                        class="mt-4 inline-block px-4 py-2 bg-amber-700 text-white rounded hover:bg-amber-800">
                        Pesan Sekarang
                    </a>
                </div>
            @empty
                <p class="text-center text-stone-500 col-span-3">Belum ada paket yang tersedia.</p>
            @endforelse
        </div>

    </div>
</x-layouts.app>
