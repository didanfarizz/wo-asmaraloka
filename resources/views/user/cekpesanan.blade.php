<x-layouts.app title="Cek Pesanan">
    {{-- Container utama --}}
    <div class="max-w-xl mx-auto px-4 sm:px-6 lg:px-8 py-20">

        {{-- Judul Halaman --}}
        <div class="text-center mb-10">
            <h1 class="text-4xl font-bold text-stone-800">
                Masukan Kode Pesanan
            </h1>
            <p class="text-md text-stone-600 mt-2">
                Lihat status pesananmu di Asmaraloka dengan kode unik yang kamu terima.
            </p>
        </div>

        {{-- Tampilkan pesan error atau sukses --}}
        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        {{-- Formulir Pencarian --}}
        <div class="bg-white p-8 rounded-xl shadow-xl border border-amber-100">

            {{-- {{<form action="{{ route('cek.pesanan') }}" method="POST" class="flex flex-col items-center">}} --}}
            <form method="POST" class="flex flex-col items-center">
                  
                @csrf

                {{-- Input Kode Pesanan --}}
                <input type="text" name="kode_pesanan" placeholder="" required
                    class="w-full md:w-3/4 px-5 py-3 text-lg border-2 border-stone-300 rounded-lg 
                           focus:border-amber-600 focus:ring-amber-600 transition duration-300 shadow-md mb-8 text-center">

                {{-- Tombol Cari Pesanan --}}
                <button type="submit"
                    class="w-auto px-10 py-3 bg-amber-700 text-white font-semibold text-lg rounded-lg 
                           hover:bg-amber-800 transition duration-300 shadow-lg">
                    Cari Pesanan
                </button>
            </form>

        </div>

    </div>
</x-layouts.app>
