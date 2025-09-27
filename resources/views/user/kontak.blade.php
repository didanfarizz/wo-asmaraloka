<x-layouts.app title="Kontak Kami">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-stone-800 border-b-2 border-amber-500 inline-block pb-2">
                Kontak Kami
            </h1>
            <p class="text-lg text-stone-600 mt-4">
                Hubungi tim Asmaraloka melalui media di bawah ini.
            </p>
        </div>

        <div class="bg-white p-8 md:p-12 rounded-xl shadow-2xl border border-amber-100">

            @php
                $kontak = [
                    ['platform' => 'WhatsApp', 'info' => $setting->whatsapp_url ?? '-', 'icon' => 'fa-whatsapp'],
                    ['platform' => 'Instagram', 'info' => $setting->instagram_url ?? '-', 'icon' => 'fa-instagram'],
                    ['platform' => 'Nomor Telepon', 'info' => $setting->phone_number ?? '-', 'icon' => 'fa-phone'],
                    ['platform' => 'Email', 'info' => $setting->email ?? '-', 'icon' => 'fa-envelope'],
                ];
            @endphp

            @foreach ($kontak as $item)
                <div class="flex items-center justify-between py-5 border-b last:border-b-0 border-stone-200">
                    <div class="flex items-center">
                        {{-- Icon bisa ditambahkan jika FontAwesome dipakai --}}
                        {{-- <i class="fab {{ $item['icon'] }} text-amber-700 text-xl mr-3"></i> --}}
                        <span class="text-xl font-semibold text-stone-700">
                            {{ $item['platform'] }}
                        </span>
                    </div>

                    <a href="#"
                        class="text-xl font-bold text-amber-700 hover:text-amber-800 transition duration-300">
                        {{ $item['info'] }}
                    </a>
                </div>
            @endforeach

            <p class="text-center text-stone-500 mt-8 text-sm italic">
                Kami siap melayani konsultasi Anda pada hari kerja (09:00 - 17:00 WIB).
            </p>

        </div>
    </div>
</x-layouts.app>
