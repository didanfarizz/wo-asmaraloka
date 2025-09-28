<x-layouts.app title="Cek Status Pesanan">

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-20 bg-[#F9F6F3] min-h-[80vh]">

        <div class="text-center mb-12">
            <h1 class="text-4xl font-serif font-bold text-[#5A4737] mb-2">
                Cek Status Pemesanan Anda
            </h1>
            <p class="text-stone-500 max-w-2xl mx-auto">
                Masukkan alamat email yang Anda gunakan saat melakukan pemesanan.
            </p>
        </div>

        {{-- Form Pencarian --}}
        <div class="bg-white p-8 rounded-xl shadow-lg mb-10 border-t-4 border-amber-600 max-w-xl mx-auto">
            <form action="{{ route('cek.pesanan.check') }}" method="POST" class="flex flex-col md:flex-row gap-3">
                @csrf
                <div class="flex-grow">
                    <input type="email" name="email"
                        class="w-full px-4 py-3 border border-stone-300 rounded-lg focus:ring-[#A0522D] focus:border-[#A0522D] transition duration-300"
                        placeholder="Masukkan Email Pemesanan Anda" value="{{ $email ?? old('email') }}" required>
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit"
                    class="px-6 py-3 bg-[#5A4737] text-white font-bold rounded-lg hover:bg-[#A0522D] transition duration-300">
                    <i class="fas fa-search mr-2"></i> Cari Pesanan
                </button>
            </form>
        </div>

        <?php
        if (!empty($orders) && count($orders) > 0): ?>
            <h2 class="text-2xl font-bold text-stone-800 mb-6 border-b pb-3">
                Daftar Pesanan untuk: <span class="text-amber-600">{{ $email }}</span>
            </h2>

            <div class="space-y-6">
                @foreach ($orders as $order)
                    @php
                        // Logika Status
                        $statusText = match ($order->status) {
                            'requested' => 'Menunggu Konfirmasi',
                            'approved' => 'Pesanan Diterima & Disetujui',
                            'rejected' => 'Dibatalkan/Ditolak',
                            default => 'Status Tidak Diketahui',
                        };
                        $statusColor = match ($order->status) {
                            'requested' => 'bg-yellow-100 text-yellow-800 border-yellow-300',
                            'approved' => 'bg-green-100 text-green-800 border-green-300',
                            'rejected' => 'bg-red-100 text-red-800 border-red-300',
                            default => 'bg-stone-100 text-stone-600 border-stone-300',
                        };

                        // Pengecekan untuk Paket yang Hilang/Dihapus
                        $packageName = $order->catalogue->package_name ?? 'Paket Kustom (Katalog Hilang)';
                    @endphp
                    <div class="bg-white p-6 rounded-xl shadow-md border-l-8 border-{{ $order->status == 'approved' ? 'green' : ($order->status == 'requested' ? 'yellow' : 'red') }}-500 flex justify-between items-start flex-wrap gap-4">
                        
                        {{-- Info Utama --}}
                        <div>
                            <p class="text-sm text-stone-500">Paket Dipesan</p>
                            {{-- MENGGUNAKAN NULL COALESCING OPERATOR UNTUK AMAN --}}
                            <h3 class="text-xl font-bold text-[#5A4737] mb-2">{{ $packageName }}</h3>
                            <p class="text-sm text-stone-600">
                                <i class="fas fa-calendar-alt mr-2 text-amber-600"></i> 
                                **Tanggal Acara:** {{ \Carbon\Carbon::parse($order->wedding_date)->format('d F Y') }}
                            </p>
                            <p class="text-sm text-stone-600">
                                <i class="fas fa-phone mr-2 text-amber-600"></i> 
                                **Nomor Telepon:** {{ $order->phone_number }}
                            </p>
                        </div>

                        {{-- Status --}}
                        <div class="text-right">
                            <p class="text-sm font-medium text-stone-500 mb-2">Status Terkini</p>
                            <span class="px-4 py-2 inline-flex text-sm leading-5 font-bold rounded-full border {{ $statusColor }}">
                                {{ $statusText }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        @elseif (isset($email))
            {{-- Tampilkan jika email sudah di-submit tapi tidak ada hasil --}}
            <div class="text-center p-10 bg-amber-50 rounded-xl shadow-inner max-w-xl mx-auto">
                <i class="fas fa-exclamation-circle text-4xl text-amber-600 mb-4"></i>
                <p class="text-lg text-stone-600 font-medium">
                    Mohon maaf, tidak ditemukan pesanan dengan email <span class="font-bold">{{ $email }}</span>.
                </p>
                <p class="text-sm text-stone-500 mt-2">Pastikan email yang Anda masukkan sudah benar dan coba lagi.</p>
            </div>
        @endif
    </div>
</x-layouts.app>