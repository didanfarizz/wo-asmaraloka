<x-layouts.app title="Kontak Kami">
    {{-- Container utama dengan padding dan lebar maksimum --}}
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

        {{-- Judul Halaman --}}
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-stone-800 border-b-2 border-amber-500 inline-block pb-2">
                Kontak Kami
            </h1>
            <p class="text-lg text-stone-600 mt-4">
                Hubungi tim Asmaraloka melalui media di bawah ini.
            </p>
        </div>

        {{-- Kotak Informasi Kontak --}}
        <div class="bg-white p-8 md:p-12 rounded-xl shadow-2xl border border-amber-100">

            {{-- Item Kontak --}}
            @php
                $kontak = [
                    ['platform' => 'WhatsApp', 'info' => '0812-3456-7890', 'icon' => 'fa-whatsapp'],
                    ['platform' => 'Instagram', 'info' => '@Asmaraloka.wo', 'icon' => 'fa-instagram'],
                    ['platform' => 'Nomor Telepon', 'info' => '(021) 9876-5432', 'icon' => 'fa-phone'],
                ];
            @endphp

            @foreach ($kontak as $item)
                <div class="flex items-center justify-between py-5 border-b last:border-b-0 border-stone-200">

                    {{-- Nama Platform (Lebih bold dan elegan) --}}
                    <div class="flex items-center">
                        {{-- Asumsi menggunakan FontAwesome atau sejenisnya. --}}
                        {{-- <i class="fab {{ $item['icon'] }} text-amber-700 text-xl mr-3"></i> --}}
                        <span class="text-xl font-semibold text-stone-700">
                            {{ $item['platform'] }}
                        </span>
                    </div>

                    {{-- Informasi Kontak (Warna Emas untuk penekanan) --}}
                    <a href="#"
                        class="text-xl font-bold text-amber-700 hover:text-amber-800 transition duration-300">
                        {{ $item['info'] }}
                    </a>
                </div>
            @endforeach

            {{-- Catatan Tambahan --}}
            <p class="text-center text-stone-500 mt-8 text-sm italic">
                Kami siap melayani konsultasi Anda pada hari kerja (09:00 - 17:00 WIB).
            </p>

        </div>

    </div>
</x-layouts.app>
