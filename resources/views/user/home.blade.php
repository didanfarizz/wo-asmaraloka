<x-layouts.app title="Beranda - LUVIRA">
    {{-- Hero Section --}}
    <div class="w-full h-screen">
        <div class="absolute inset-0">
            <img
                src="{{ asset('images/hero.jpg') }}"
                alt="hero"
                class="h-full w-full object-cover object-center"
            />

            <div class="absolute inset-0 bg-black/60"></div>
        </div>

        <div class="relative z-10 flex min-h-screen flex-col items-center justify-center gap-4 p-4 text-center">
            <h1 class="text-4xl font-bold text-[#F9F6F3] md:text-6xl">
                LUVIRA
            </h1>
            <h3 class="text-2xl font-bold text-[#F9F6F3] md:text-4xl">
                Wujudkan Kisah Cinta Anda menjadi Kenyataan Agung
            </h3>
            <div class="mt-10 scroll-smooth text-lg bg-[#5A4737] p-4 rounded-xl hover:bg-[#F9F6F3] hover:text-[#5A4737] text-[#F9F6F3] md:text-2xl">
                <a href="#layanan-kami">Lihat Selengkapnya</a>
            </div>
        </div>
    </div>

    {{-- Section: LAYANAN KAMI (Dikonversi dari services.tsx) --}}
    <section class="bg-[#F9F6F3] py-16" id="layanan-kami">
        <div class="max-w-7xl mx-auto px-4 text-center sm:px-6 lg:px-8">
            <div class="mb-10 flex items-center justify-center">
                <img src="{{ asset('images/bunga-1.png') }}" alt="bunga1" class="w-60" />
            </div>
            <h2 class="mb-12 inline-block border-b-2 border-[#5A4737] pb-1 font-serif text-3xl text-[#5A4737] md:text-4xl">
                LAYANAN KAMI
            </h2>
            
            {{-- Bagian Grid untuk Card Layanan --}}
            <div class="grid gap-10 md:grid-cols-3">
                @php
                    $services = [
                        [
                            'icon_class' => 'fas fa-heart',
                            'title' => 'Floral & Decor Mastery',
                            'description' => 'Katalog yang berisi konsep desain visual dan instalasi bunga premium yang dikurasi Luvira. Kami bermitra dengan florist dan desainer dekorasi elit untuk menciptakan ambience yang dramatis, elegan, dan fotogenik, menggunakan bunga-bunga impor terbaik.',
                        ],
                        [
                            'icon_class' => 'fas fa-calendar-alt',
                            'title' => 'Bridal Aesthetics',
                            'description' => 'Kami menghubungkan Anda dengan Master MUA, penata rambut, dan desainer couture terbaik untuk memastikan penampilan Anda di Hari-H sempurna, abadi, dan tanpa cela. Katalog ini berisi pilihan vendor top-tier yang menjamin kualitas dan kemewahan pada bridal look Anda.',
                        ],
                        [
                            'icon_class' => 'fas fa-camera',
                            'title' => 'Culinary Experience',
                            'description' => 'Menghadirkan katering fine dining, kue pernikahan bespoke, dan layanan minuman spesial yang akan memanjakan tamu Anda. Katalog ini menjamin kualitas rasa dan presentasi makanan setara hotel bintang lima, menjadikan pesta Anda berkesan hingga santapan terakhir.',
                        ],
                    ];
                @endphp

                @foreach ($services as $service)
                    <div class="flex flex-col items-center p-8 bg-white rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300 text-center">
                        <div class="flex items-center justify-center w-24 h-24 bg-stone-100 rounded-full mb-6">
                            <div class="text-4xl text-[#5A4737]">
                                <i class="{{ $service['icon_class'] }}"></i> 
                            </div> 
                        </div>

                        <h3 class="text-xl font-serif font-semibold text-[#5A4737] mb-3 leading-tight">
                            {{ $service['title'] }}
                        </h3>

                        <p class="text-sm text-[#5A4737] mb-8 flex-grow">
                            {{ $service['description'] }}
                        </p>

                        <a href="{{ route('kontak') }}" {{-- Link mengarah ke kontak karena ini layanan general --}}
                           class="px-6 py-2 bg-stone-200 text-[#5A4737] text-sm font-medium rounded-full hover:bg-stone-300 transition duration-300 shadow-sm">
                            Hubungi Kami
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    
    {{-- SECTION: PAKET PERNIKAHAN PILIHAN --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16" id="paket-kami">
        <div class="mb-10 flex items-center justify-center">
            {{-- Menggunakan bunga-1 yang diputar agar tidak perlu gambar baru --}}
            <img src="{{ asset('images/bunga-1.png') }}" alt="dekorasi" class="w-60 transform rotate-180" /> 
        </div>
        <h2 class="mb-12 inline-block border-b-2 border-[#5A4737] pb-1 font-serif text-3xl text-[#5A4737] md:text-4xl text-center w-full">
            PAKET PERNIKAHAN PILIHAN
        </h2>

        {{-- Grid untuk Paket Pernikahan --}}
        <div class="grid gap-10 md:grid-cols-2 lg:grid-cols-3">
            @if ($katalog->isNotEmpty())
                @foreach ($katalog as $item) 
                    {{-- Kartu Paket yang Didesain Ulang --}}
                    <div class="flex flex-col bg-white rounded-2xl shadow-xl overflow-hidden 
                                transform transition duration-500 hover:scale-[1.03] hover:shadow-2xl 
                                border border-stone-100"> 
                        
                        {{-- Area Gambar Paket --}}
                        <div class="relative w-full h-56 overflow-hidden">
                             <img 
                                src="{{ asset('images/' . $item->image) }}" 
                                alt="{{ $item->package_name }}" 
                                class="w-full h-full object-cover transition duration-500 hover:opacity-90"
                            />
                            {{-- Badge Harga di Sudut --}}
                            <div class="absolute top-4 right-4 bg-green-700 text-white font-bold px-4 py-2 rounded-full shadow-lg">
                                Rp{{ number_format($item->price, 0, ',', '.') }}
                            </div>
                        </div>

                        {{-- Area Konten/Deskripsi --}}
                        <div class="p-6 flex flex-col flex-grow">
                            {{-- Judul Paket --}} 
                            <h3 class="text-2xl font-serif font-bold text-[#5A4737] mb-2 leading-snug"> 
                                {{ $item->package_name }} 
                            </h3> 
                            
                            {{-- Deskripsi Ringkas --}} 
                            <p class="text-sm text-stone-600 mb-4 flex-grow"> 
                                {{ \Illuminate\Support\Str::limit($item->description, 100, '...') }} 
                            </p>

                            {{-- Tombol "Pesan Sekarang" --}} 
                            <a href="{{ route('pesan.form', $item->catalogue_id) }}" 
                                class="mt-4 w-full py-3 bg-[#5A4737] text-white text-base font-semibold rounded-lg 
                                       hover:bg-[#A0522D] transition duration-300 shadow-md flex items-center justify-center space-x-2"> 
                                <i class="fas fa-ring"></i>
                                <span>Pesan Sekarang</span>
                            </a> 
                        </div>
                    </div> 
                @endforeach 
            @else
                <div class="md:col-span-3 text-center">
                    <p class="text-lg text-stone-500 italic py-10">
                        <i class="fas fa-box-open mr-2"></i> Belum ada paket katalog yang dipublikasikan.
                    </p>
                </div>
            @endif
        </div>
    </section>
</x-layouts.app>