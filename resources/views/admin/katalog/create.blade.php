<x-layouts.admin-layout title="Tambah Katalog Baru">

    {{-- Header Halaman --}}
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-stone-800">Tambah Paket Baru</h1>
        <p class="text-stone-500 mt-1">Masukkan detail lengkap untuk paket layanan baru di katalog LUVIRA.</p>
    </div>

    {{-- Form Card --}}
    {{-- PENTING: Tambahkan enctype="multipart/form-data" untuk upload file --}}
    <div class="max-w-3xl mx-auto bg-white p-10 rounded-2xl shadow-2xl border border-amber-50">
        
        <h2 class="text-3xl font-bold text-[#5A4737] mb-8 border-b pb-4">Data Paket</h2>

        <form action="{{ route('admin.katalog.store') }}" method="POST" class="space-y-6" enctype="multipart/form-data">
            @csrf

            {{-- Nama Paket & Harga (Grouped) --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                {{-- Nama Paket --}}
                <div>
                    <label for="package_name" class="block mb-2 font-semibold text-stone-700">Nama Paket</label>
                    <input type="text" name="package_name" id="package_name" value="{{ old('package_name') }}"
                        class="w-full px-4 py-3 border border-stone-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#A0522D] focus:border-[#A0522D] transition duration-300 shadow-sm"
                        placeholder="Cth: Paket Silver Elegance">
                    @error('package_name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Harga --}}
                <div>
                    <label for="price" class="block mb-2 font-semibold text-stone-700">Harga (Rp)</label>
                    <input type="number" name="price" id="price" value="{{ old('price') }}"
                        class="w-full px-4 py-3 border border-stone-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#A0522D] focus:border-[#A0522D] transition duration-300 shadow-sm"
                        placeholder="Cth: 25000000">
                    @error('price')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Deskripsi --}}
            <div>
                <label for="description" class="block mb-2 font-semibold text-stone-700">Deskripsi Paket</label>
                <textarea name="description" id="description" rows="5"
                    class="w-full px-4 py-3 border border-stone-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#A0522D] focus:border-[#A0522D] transition duration-300 shadow-sm"
                    placeholder="Jelaskan detail layanan dan keunggulan paket ini...">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            {{-- Status & Gambar (Grouped) --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                {{-- Status Publish --}}
                <div>
                    <label for="status_publish" class="block mb-2 font-semibold text-stone-700">Status Publish</label>
                    <select name="status_publish" id="status_publish"
                        class="w-full px-4 py-3 border border-stone-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#A0522D] focus:border-[#A0522D] transition duration-300 shadow-sm">
                        <option value="Y" {{ old('status_publish') == 'Y' ? 'selected' : '' }}>✅ Tayangkan (Publish)</option>
                        <option value="N" {{ old('status_publish') == 'N' ? 'selected' : '' }}>🚫 Sembunyikan (Draft)</option>
                    </select>
                    @error('status_publish')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Input File Gambar --}}
                <div>
                    <label for="image" class="block mb-2 font-semibold text-stone-700">Unggah Gambar Paket</label>
                    <input type="file" name="image" id="image" required
                        class="w-full text-stone-700 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-amber-100 file:text-[#A0522D] hover:file:bg-amber-200 transition duration-300">
                    <p class="text-xs text-stone-500 mt-1">Format: JPG, PNG. Max: 2MB.</p>
                    @error('image')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex justify-end space-x-3 pt-6 border-t">
                {{-- Tombol Batal --}}
                <a href="{{ route('admin.katalog.index') }}"
                    class="px-6 py-3 bg-stone-300 text-stone-700 font-bold rounded-lg hover:bg-stone-400 transition duration-300 flex items-center">
                    <i class="fas fa-times-circle mr-2"></i> Batal
                </a>
                
                {{-- Tombol Simpan --}}
                <button type="submit"
                    class="px-6 py-3 bg-[#A0522D] text-white font-bold text-lg rounded-lg 
                           hover:bg-[#8D4829] transition duration-300 shadow-lg transform hover:scale-[1.01]">
                    <i class="fas fa-save mr-2"></i> Simpan Katalog
                </button>
            </div>
        </form>
    </div>

</x-layouts.admin-layout>