<x-layouts.app title="Beranda">
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
    <section class="bg-[#F9F6F3]" id="layanan-kami">
        <div class="px-4 text-center sm:px-6 lg:px-8">
            <div class="mb-10 flex items-center justify-center">
                {{-- Asumsi gambar bunga ada di public/bunga-1.png --}}
                <img src="{{ asset('images/bunga-1.png') }}" alt="bunga1" class="w-60" />
            </div>
            <h2 class="mb-12 inline-block border-b-2 border-[#5A4737] pb-1 font-serif text-3xl text-[#5A4737] md:text-4xl">
                LAYANAN KAMI
            </h2>
            
            {{-- Bagian Grid untuk Card Layanan --}}
            <div class="grid gap-10 md:grid-cols-3">
                {{-- Data Services (Dikonversi dari array services di services.tsx) --}}
                @php
                    $services = [
                        [
                            'icon_class' => 'fas fa-heart', // Ganti ikon React dengan kelas Font Awesome
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

                {{-- Loop untuk menampilkan ServiceCard (Dikonversi dari ServiceCard.tsx) --}}
                @foreach ($services as $service)
                    {{-- Card Desain Layanan --}}
                    <div class="flex flex-col items-center p-8 bg-white rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300 text-center">
                        
                        {{-- Wadah Ikon dengan Lingkaran Krem (Icon Container) --}}
                        <div class="flex items-center justify-center w-24 h-24 bg-stone-100 rounded-full mb-6">
                            {{-- Menggunakan Font Awesome (pastikan sudah terinstal/linked) --}}
                            <div class="text-4xl text-[#5A4737]">
                                <i class="{{ $service['icon_class'] }}"></i> 
                            </div> 
                        </div>

                        {{-- Judul Layanan --}}
                        <h3 class="text-xl font-serif font-semibold text-[#5A4737] mb-3 leading-tight">
                            {{ $service['title'] }}
                        </h3>

                        {{-- Deskripsi Layanan --}}
                        <p class="text-sm text-[#5A4737] mb-8 flex-grow">
                            {{ $service['description'] }}
                        </p>

                        {{-- Tombol "Pesan Sekarang" --}}
                        {{-- Note: Harga yang ada di data services.tsx tidak ditampilkan di card ini, jadi saya hapus --}}
                        <a href="#" {{-- Ganti # dengan link pemesanan yang sesuai --}}
                           class="px-6 py-2 bg-[#5A4737] text-white text-sm font-medium rounded-full hover:bg-[#F9F6F3] hover:text-[#5A4737] transition duration-300 shadow-sm">
                            Pesan Sekarang
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        {{-- Section: Paket Pernikahan Pilihan --}}
        {{-- ... (Kode Paket Pernikahan Anda) ... --}}
    </div>
</x-layouts.app>
