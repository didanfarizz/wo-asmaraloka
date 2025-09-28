<x-layouts.admin-layout title="Pengaturan Sistem">

    {{-- Header Halaman --}}
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-stone-800">Pengaturan Website</h1>
        <p class="text-stone-500 mt-1">Kelola informasi kontak dan detail operasional dasar situs LUVIRA.</p>
    </div>

    <div class="max-w-4xl mx-auto bg-white p-10 rounded-2xl shadow-xl border border-amber-50">

        <h2 class="text-3xl font-bold text-[#5A4737] mb-8 border-b pb-3">Update Informasi Dasar</h2>

        {{-- Notifikasi Sukses --}}
        @if (session('success'))
            <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 rounded-lg shadow-sm font-medium flex items-center">
                <i class="fas fa-check-circle mr-3"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-8">
            @csrf

            {{-- Kelompok 1: Detail Kontak Utama --}}
            <div class="border-b pb-8">
                <h3 class="text-xl font-semibold text-stone-800 mb-4 flex items-center">
                    <i class="fas fa-address-book text-amber-600 mr-3"></i> Detail Kontak
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="phone_number" class="block mb-2 font-semibold text-stone-700">Nomor Telepon</label>
                        <input type="text" id="phone_number" name="phone_number" value="{{ old('phone_number', $setting->phone_number ?? '') }}"
                            class="w-full px-4 py-3 border border-stone-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#A0522D] focus:border-[#A0522D] transition duration-300 shadow-sm"
                            placeholder="Cth: 08123456789">
                    </div>

                    <div>
                        <label for="email" class="block mb-2 font-semibold text-stone-700">Email Bisnis</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $setting->email ?? '') }}"
                            class="w-full px-4 py-3 border border-stone-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#A0522D] focus:border-[#A0522D] transition duration-300 shadow-sm"
                            placeholder="Cth: info@luvira.com">
                    </div>
                </div>
                
                <div class="mt-6">
                    <label for="address" class="block mb-2 font-semibold text-stone-700">Alamat Lengkap</label>
                    <textarea id="address" name="address" rows="3" placeholder="Alamat kantor atau lokasi bisnis"
                        class="w-full px-4 py-3 border border-stone-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#A0522D] focus:border-[#A0522D] transition duration-300 shadow-sm">{{ old('address', $setting->address ?? '') }}</textarea>
                </div>
            </div>

            {{-- Kelompok 2: URL Media Sosial --}}
            <div>
                <h3 class="text-xl font-semibold text-stone-800 mb-4 flex items-center">
                    <i class="fas fa-share-alt text-amber-600 mr-3"></i> Media Sosial & Link Cepat
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="instagram_url" class="block mb-2 font-semibold text-stone-700">Instagram URL</label>
                        <input type="url" id="instagram_url" name="instagram_url"
                            value="{{ old('instagram_url', $setting->instagram_url ?? '') }}"
                            class="w-full px-4 py-3 border border-stone-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#A0522D] focus:border-[#A0522D] transition duration-300 shadow-sm"
                            placeholder="https://instagram.com/luvira_official">
                    </div>

                    <div>
                        <label for="whatsapp_url" class="block mb-2 font-semibold text-stone-700">WhatsApp Chat URL (wa.me/)</label>
                        <input type="url" id="whatsapp_url" name="whatsapp_url"
                            value="{{ old('whatsapp_url', $setting->whatsapp_url ?? '') }}"
                            class="w-full px-4 py-3 border border-stone-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#A0522D] focus:border-[#A0522D] transition duration-300 shadow-sm"
                            placeholder="https://wa.me/628123456789">
                    </div>
                </div>
            </div>

            {{-- Tombol Simpan --}}
            <div class="pt-6 border-t flex justify-end">
                <button type="submit"
                    class="px-8 py-3 bg-[#A0522D] text-white font-bold text-lg rounded-lg 
                           hover:bg-[#8D4829] transition duration-300 shadow-lg transform hover:scale-[1.01]">
                    <i class="fas fa-save mr-2"></i> Simpan Perubahan
                </button>
            </div>
        </form>

    </div>

</x-layouts.admin-layout>