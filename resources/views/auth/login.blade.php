{{-- Menggunakan layout yang minimalis untuk halaman otentikasi --}}
<x-layouts.app title="Login Admin - LUVIRA">
    {{-- Background dan Centering Vertikal/Horizontal Penuh --}}
    {{-- Tinggi layar penuh (h-screen) dan warna latar belakang yang lembut --}}
    <div class="min-h-screen flex items-center justify-center bg-[#F4F1ED] px-4 sm:px-6 lg:px-8">

        <div class="max-w-md w-full space-y-10">
            
            {{-- Header Logo / Nama Aplikasi --}}
            <div class="text-center">
                {{-- Ganti 'LUVIRA' dengan logo jika ada, atau gunakan font yang elegan --}}
                <h1 class="text-5xl font-serif font-bold text-[#5A4737] tracking-wider">
                    LUVIRA
                </h1>
                <h2 class="mt-4 text-2xl font-semibold text-stone-700">
                    Panel Admin
                </h2>
            </div>

            {{-- Formulir Login Card yang Didesain Ulang --}}
            <div class="bg-white p-10 rounded-2xl shadow-xl border border-stone-100 transition duration-500 hover:shadow-2xl">
                
                <h3 class="text-center text-3xl font-bold text-stone-800 mb-6">
                    Akses Masuk
                </h3>

                <form class="space-y-6" action="{{ route('login') }}" method="POST">
                    @csrf

                    {{-- Pesan Kesalahan Global (Tampilan Lebih Rapi) --}}
                    @error('username')
                        <div class="flex items-center bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded-lg shadow-sm"
                            role="alert">
                            <i class="fas fa-exclamation-circle mr-3"></i>
                            <span class="block sm:inline font-medium text-sm">{{ $message }}</span>
                        </div>
                    @enderror

                    {{-- Input Username --}}
                    <div>
                        <label for="username" class="block text-sm font-semibold text-stone-700 mb-2">
                            Username
                        </label>
                        <div class="relative">
                            {{-- Ikon di Kiri Input --}}
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-user text-stone-400"></i>
                            </div>
                            <input id="username" name="username" type="text" required value="{{ old('username') }}"
                                class="w-full pl-10 pr-4 py-3 border border-stone-300 rounded-lg 
                                       text-stone-900 focus:outline-none focus:ring-2 focus:ring-amber-600 focus:border-amber-600 
                                       transition duration-300 placeholder-stone-400 shadow-sm"
                                placeholder="Masukkan Username Anda">
                        </div>
                    </div>

                    {{-- Input Password --}}
                    <div>
                        <label for="password" class="block text-sm font-semibold text-stone-700 mb-2">
                            Password
                        </label>
                        <div class="relative">
                            {{-- Ikon di Kiri Input --}}
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-stone-400"></i>
                            </div>
                            <input id="password" name="password" type="password" autocomplete="current-password" required
                                class="w-full pl-10 pr-4 py-3 border border-stone-300 rounded-lg 
                                       text-stone-900 focus:outline-none focus:ring-2 focus:ring-amber-600 focus:border-amber-600 
                                       transition duration-300 placeholder-stone-400 shadow-sm"
                                placeholder="Masukkan Password Anda">
                        </div>
                    </div>

                    {{-- Tombol Sign In --}}
                    <div class="pt-2">
                        <button type="submit"
                            class="group relative w-full flex justify-center items-center py-3 px-4 text-lg font-bold rounded-lg 
                                   text-white bg-[#A0522D] hover:bg-[#8D4829] 
                                   focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#A0522D] 
                                   transition duration-300 shadow-lg transform hover:scale-[1.01]">
                            <i class="fas fa-sign-in-alt mr-2"></i>
                            Login
                        </button>
                    </div>
                </form>
            </div>
            
            {{-- Footer Tambahan --}}
            <p class="text-center text-stone-500 text-sm italic">
                Akses ini hanya untuk administrator sistem LUVIRA.
            </p>
        </div>
    </div>
</x-layouts.app>