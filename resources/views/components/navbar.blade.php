<nav class="sticky top-0 z-50 px-10 py-5 bg-[#F9F6F3] shadow-md backdrop-blur-sm">
    <div class="max-w-7xl mx-auto flex items-center justify-between px-6 py-4 md:py-5">
        {{-- Navigasi Di Kiri --}}
        <div class="flex gap-40 text-[#5A4737] space-x-8 text-lg font-medium ">
            <a href="{{ route('home') }}" class="hover:text-[#795F48] transition duration-200">
                Beranda
            </a>
            <a href="{{ route('kontak') }}" class="hover:text-[#795F48] transition duration-200">
                Kontak Kami
            </a>
        </div>
        
        {{-- Logo/Brand --}}
        <a href="{{ route('home') }}" class="text-3xl font-extrabold text-[#5A4737] tracking-wider font-serif transition duration-300 hover:text-amber-800">
            LUVIRA
        </a>
        
        
        {{-- Tombol Aksi (Kanan) --}}
        <div class="flex gap-40 text-[#5A4737] space-x-8 text-lg font-medium justify-center items-center">
            <a href="{{ route('cek.pesanan.form') }}" class="hover:text-[#795F48] transition duration-200">
                Cek Pesanan
            </a>
            @auth
                {{-- Tampilkan tombol Profil jika sudah login --}}
                <a href="{{ route('riwayat.pesanan') }}" class="px-5 py-2 bg-[#795F48] text-[#F9F6F3] font-semibold rounded-lg hover:bg-amber-800 transition shadow-md">
                    Dashboard
                </a>
            @else
                {{-- Tombol Login (Gaya Premium) --}}
                <a href="{{ route('login') }}" 
                   class="px-5 py-2 border-2 border-[#795F48] text-[#795F48] font-semibold 
                          rounded-lg hover:bg-[#795F48] hover:text-[#F9F6F3] transition duration-300 shadow-sm hover:shadow-lg">
                    Login
                </a>
            @endauth
        </div>

    </div>
</nav>