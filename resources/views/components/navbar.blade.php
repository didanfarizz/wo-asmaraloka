<nav class="bg-white shadow-lg border-b border-amber-100">
    <div class="max-w-7xl mx-auto flex items-center justify-between px-6 py-4 md:py-5">
        
        {{-- Logo/Brand --}}
        <a href="{{ route('home') }}" class="text-3xl font-extrabold text-amber-700 tracking-wider font-serif transition duration-300 hover:text-amber-800">
            Asmaraloka
        </a>
        
        {{-- Navigasi Utama (Di tengah) --}}
        <div class="hidden md:flex space-x-8 text-lg font-medium text-stone-700">
            <a href="{{ route('home') }}" class="hover:text-amber-700 transition duration-200">
                Beranda
            </a>
            <a href="{{ route('kontak') }}" class="hover:text-amber-700 transition duration-200">
                Kontak Kami
            </a>
            <a href="{{ route('cek.pesanan.form') }}" class="hover:text-amber-700 transition duration-200">
                Cek Pesanan
            </a>
        </div>
        
        {{-- Tombol Aksi (Kanan) --}}
        <div>
            @auth
                {{-- Tampilkan tombol Profil jika sudah login --}}
                <a href="{{ route('riwayat.pesanan') }}" class="px-5 py-2 bg-amber-700 text-white font-semibold rounded-lg hover:bg-amber-800 transition shadow-md">
                    Dashboard
                </a>
            @else
                {{-- Tombol Login (Gaya Premium) --}}
                <a href="{{ route('login') }}" 
                   class="px-5 py-2 border-2 border-amber-700 text-amber-700 font-semibold 
                          rounded-lg hover:bg-amber-700 hover:text-white transition duration-300 shadow-sm hover:shadow-lg">
                    Login
                </a>
            @endauth
        </div>

    </div>
</nav>