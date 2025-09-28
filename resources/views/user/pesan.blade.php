<x-layouts.app title="Pesan Paket Pernikahan">

    {{-- Form Pemesanan dengan Desain Elegan --}}
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-20 bg-[#F9F6F3]">

        <div class="text-center mb-12">
            <h1 class="text-4xl font-serif font-bold text-[#5A4737] mb-2">
                Pesan Paket <span class="text-amber-600">{{ $item->package_name }}</span>
            </h1>
            <p class="text-stone-500 max-w-2xl mx-auto">
                Lengkapi detail di bawah ini. Kami akan segera menghubungi Anda untuk konfirmasi pesanan.
            </p>
        </div>

        <div class="bg-white p-8 md:p-12 rounded-2xl shadow-2xl border-t-8 border-[#5A4737]">
            
            {{-- Detail Paket yang Dipesan --}}
            <div class="mb-8 p-6 bg-amber-50 rounded-xl border border-amber-200">
                <h2 class="text-2xl font-semibold text-[#5A4737] mb-3 flex items-center">
                    <i class="fas fa-box-open mr-3 text-amber-600"></i> Detail Pesanan
                </h2>
                <div class="text-stone-700 space-y-1">
                    <p><strong>Nama Paket:</strong> {{ $item->package_name }}</p>
                    <p><strong>Harga:</strong> <span class="font-bold text-lg text-green-700">Rp{{ number_format($item->price, 0, ',', '.') }}</span></p>
                    <p class="text-sm italic mt-2">{{ \Illuminate\Support\Str::limit($item->description, 100) }}</p>
                </div>
            </div>

            {{-- Formulir --}}
            <form action="{{ route('pesan.store', $item->catalogue_id) }}" method="POST">
                @csrf

                {{-- Nama Pemesan --}}
                <div class="mb-6">
                    <label for="name" class="block text-sm font-medium text-stone-700 mb-2">Nama Lengkap</label>
                    <input type="text" id="name" name="name"
                        class="w-full px-4 py-3 border border-stone-300 rounded-lg focus:ring-[#A0522D] focus:border-[#A0522D] transition duration-300"
                        placeholder="Masukkan nama lengkap Anda" value="{{ old('name') }}" required>
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-stone-700 mb-2">Email</label>
                    <input type="email" id="email" name="email"
                        class="w-full px-4 py-3 border border-stone-300 rounded-lg focus:ring-[#A0522D] focus:border-[#A0522D] transition duration-300"
                        placeholder="name@contoh.com (Digunakan untuk cek status pesanan)" value="{{ old('email') }}" required>
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Telepon --}}
                <div class="mb-6">
                    <label for="phone" class="block text-sm font-medium text-stone-700 mb-2">Nomor Telepon (WhatsApp)</label>
                    <input type="tel" id="phone" name="phone"
                        class="w-full px-4 py-3 border border-stone-300 rounded-lg focus:ring-[#A0522D] focus:border-[#A0522D] transition duration-300"
                        placeholder="Contoh: 081234567890" value="{{ old('phone') }}" required>
                    @error('phone')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Tanggal Acara --}}
                <div class="mb-8">
                    <label for="event_date" class="block text-sm font-medium text-stone-700 mb-2">Tanggal Rencana Acara</label>
                    <input type="date" id="event_date" name="event_date"
                        class="w-full px-4 py-3 border border-stone-300 rounded-lg focus:ring-[#A0522D] focus:border-[#A0522D] transition duration-300"
                        value="{{ old('event_date') }}" required>
                    @error('event_date')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Tombol Submit --}}
                <button type="submit"
                    class="w-full py-3 bg-[#5A4737] text-white font-bold rounded-lg shadow-lg hover:bg-[#A0522D] transition duration-300 transform hover:scale-[1.01]">
                    Kirim Permintaan Pemesanan
                </button>
            </form>

        </div>
    </div>
</x-layouts.app>