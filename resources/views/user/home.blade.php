<x-layouts.app title="Beranda">
    {{-- Hero Section --}}
    <div class="relative">
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat opacity-80"
            style="background-image: url('{{ asset('images/wedding-hero.png') }}');">
        </div>

        {{-- Overlay untuk kontras teks --}}
        <div class="absolute inset-0 bg-amber-900/40"></div>

        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-24 relative z-10 text-center">
            <h1 class="text-7xl md:text-8xl font-extrabold text-white tracking-wider font-serif drop-shadow-lg">
                Asmaraloka
            </h1>
            <p class="text-2xl md:text-3xl text-white mt-4 font-light drop-shadow-md max-w-2xl mx-auto">
                Wujudkan Pernikahan Impianmu dengan Sentuhan Elegan dan Hangat
            </p>
            <a href="#packages"
                class="mt-8 inline-block px-8 py-3 text-lg font-semibold bg-white text-amber-700 rounded-full shadow-xl hover:bg-amber-50 transition duration-300 transform hover:scale-105">
                Lihat Paket Pilihan
            </a>
        </div>
    </div>

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

        {{-- Section: Paket Pernikahan Pilihan --}}
        <h2 id="packages" class="text-4xl font-extrabold text-center text-stone-800 mb-12 relative pb-3">
            <span class="relative z-10">Paket Pernikahan Pilihan</span>
            <span
                class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-amber-500 rounded-full"></span>
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 lg:gap-12">
            @forelse ($katalog as $item)
                {{-- Card Desain Baru --}}
                <div
                    class="bg-white rounded-xl shadow-xl overflow-hidden transform hover:scale-[1.02] transition duration-300 ease-in-out border border-stone-200">
                    <img src="{{ asset('images/' . $item->image) }}" alt="{{ $item->package_name }}"
                        class="w-full h-56 object-cover">

                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-stone-800 mb-2">{{ $item->package_name }}</h3>
                        <p class="text-3xl font-extrabold text-amber-700 mb-4">
                            Rp{{ number_format($item->price, 0, ',', '.') }}
                        </p>
                        <p class="text-base text-stone-500 mb-5 line-clamp-3">
                            {{ $item->description }}
                        </p>
                        <a href="{{ route('paket.show', $item->catalogue_id) }}"
                            class="w-full inline-block text-center px-4 py-3 bg-amber-700 text-white font-semibold rounded-lg hover:bg-amber-800 transition duration-300">
                            Lihat Detail
                            <i class="ml-2 fas fa-arrow-right"></i> {{-- Pastikan Anda memiliki Font Awesome (fas) untuk icon --}}
                        </a>
                    </div>
                </div>
            @empty
                <p class="text-center text-stone-500 col-span-3 py-10">Belum ada paket yang tersedia. Segera hadir
                    paket-paket pernikahan terbaik dari Asmaraloka!</p>
            @endforelse
        </div>

    </div>
</x-layouts.app>
