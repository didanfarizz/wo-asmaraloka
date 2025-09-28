<x-layouts.app title="Kontak Kami - LUVIRA">
    {{-- Bagian Header: Tetap Bersih dan Fokus --}}
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 pb-8">
        <div class="text-center">
            {{-- Mengubah font dan styling agar lebih modern --}}
            <h1 class="text-5xl font-extrabold text-[#362719] tracking-tight">
                Hubungi Kami
            </h1>
            <p class="text-xl text-stone-500 mt-4 max-w-2xl mx-auto">
                Kami siap membantu Anda. Silakan hubungi tim LUVIRA melalui media di bawah ini.
            </p>
        </div>
    </div>

    {{-- Bagian Konten Utama: Redesain Layout --}}
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 pb-16">
        @php
            // Data kontak tetap sama
            $setting = $setting ?? (object)['whatsapp_url' => '-', 'instagram_url' => '-', 'phone_number' => '-', 'email' => '-'];

            $kontak = [
                ['platform' => 'WhatsApp', 'info' => $setting->whatsapp_url ?? '-', 'icon' => 'fa-brands fa-whatsapp', 'color' => 'bg-green-500', 'hover' => 'hover:bg-green-600'],
                ['platform' => 'Instagram', 'info' => $setting->instagram_url ?? '-', 'icon' => 'fa-brands fa-instagram', 'color' => 'bg-pink-600', 'hover' => 'hover:bg-pink-700'],
                ['platform' => 'Nomor Telepon', 'info' => $setting->phone_number ?? '-', 'icon' => 'fa-phone', 'color' => 'bg-indigo-500', 'hover' => 'hover:bg-indigo-600'],
                ['platform' => 'Email', 'info' => $setting->email ?? '-', 'icon' => 'fa-envelope', 'color' => 'bg-sky-500', 'hover' => 'hover:bg-sky-600'],
            ];
        @endphp

        {{-- Menggunakan Grid untuk Layout 2 Kolom --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-12">
            @foreach ($kontak as $item)
                {{-- Card untuk Setiap Item Kontak --}}
                <a href="{{ $item['info'] !== '-' ? ($item['platform'] === 'Email' ? 'mailto:' . $item['info'] : ($item['platform'] === 'Nomor Telepon' ? 'tel:' . $item['info'] : $item['info'])) : '#' }}"
                   target="_blank"
                   class="block p-6 rounded-2xl shadow-lg transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-2xl border border-stone-100 bg-white">
                    
                    <div class="flex items-start">
                        {{-- Icon Besar dan Berwarna --}}
                        {{-- Asumsi FontAwesome sudah dimuat di layout utama --}}
                        <div class="p-4 rounded-full {{ $item['color'] }} text-white flex-shrink-0 mr-5">
                            <i class="fas {{ $item['icon'] }} text-2xl"></i>
                        </div>

                        {{-- Konten Informasi Kontak --}}
                        <div>
                            <h2 class="text-2xl font-bold text-stone-800 mb-1">
                                {{ $item['platform'] }}
                            </h2>
                            {{-- Informasi Kontak sebagai Teks --}}
                            <p class="text-lg text-stone-600 mt-1 break-words">
                                {{ $item['info'] }}
                            </p>
                            
                            {{-- Teks Aksi (Call to Action) --}}
                            <span class="mt-2 inline-block text-sm font-semibold text-amber-600 hover:text-amber-700 transition duration-300">
                                @if ($item['info'] !== '-')
                                    {{ $item['platform'] === 'Email' ? 'Kirim Email' : 'Hubungi Kami' }} &rarr;
                                @else
                                    Tidak Tersedia
                                @endif
                            </span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        {{-- Catatan Jam Operasional: Lebih Menonjol --}}
        <div class="text-center mt-16 p-6 border-t-2 border-dashed border-stone-200">
            <p class="text-lg font-medium text-stone-700">
                <i class="far fa-clock mr-2 text-amber-600"></i>
                Kami siap melayani konsultasi Anda pada **hari kerja**
                <span class="font-bold text-amber-700">(09:00 - 17:00 WIB)</span>.
            </p>
        </div>
    </div>
</x-layouts.app>