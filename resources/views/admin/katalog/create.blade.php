<x-layouts.admin-layout title="Tambah Katalog">

    <div class="max-w-2xl mx-auto bg-white p-6 rounded-xl shadow-xl">
        <h2 class="text-2xl font-bold mb-6">Tambah Katalog</h2>

        <form action="{{ route('admin.katalog.store') }}" method="POST">
            @csrf

            {{-- Nama Paket --}}
            <div class="mb-4">
                <label for="package_name" class="block text-sm font-medium text-stone-700">Nama Paket</label>
                <input type="text" name="package_name" id="package_name" value="{{ old('package_name') }}"
                    class="mt-1 block w-full rounded-md border-stone-300 shadow-sm focus:border-amber-500 focus:ring-amber-500 sm:text-sm">
                @error('package_name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Harga --}}
            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-stone-700">Harga</label>
                <input type="number" name="price" id="price" value="{{ old('price') }}"
                    class="mt-1 block w-full rounded-md border-stone-300 shadow-sm focus:border-amber-500 focus:ring-amber-500 sm:text-sm">
                @error('price')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Deskripsi --}}
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-stone-700">Deskripsi</label>
                <textarea name="description" id="description" rows="4"
                    class="mt-1 block w-full rounded-md border-stone-300 shadow-sm focus:border-amber-500 focus:ring-amber-500 sm:text-sm">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Status Publish --}}
            <div class="mb-4">
                <label for="status_publish" class="block text-sm font-medium text-stone-700">Status Publish</label>
                <select name="status_publish" id="status_publish"
                    class="mt-1 block w-full rounded-md border-stone-300 shadow-sm focus:border-amber-500 focus:ring-amber-500 sm:text-sm">
                    <option value="Y" {{ old('status_publish') == 'Y' ? 'selected' : '' }}>Ya</option>
                    <option value="N" {{ old('status_publish') == 'N' ? 'selected' : '' }}>Tidak</option>
                </select>
                @error('status_publish')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Nama File Gambar --}}
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-stone-700">Nama File Gambar</label>
                <input type="text" name="image" id="image" value="{{ old('image') }}"
                    placeholder="contoh: paket_silver.jpg"
                    class="mt-1 block w-full rounded-md border-stone-300 shadow-sm focus:border-amber-500 focus:ring-amber-500 sm:text-sm">
                @error('image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end space-x-2">
                <a href="{{ route('admin.katalog.index') }}"
                    class="px-4 py-2 bg-stone-300 rounded-lg hover:bg-stone-400">Batal</a>
                <button type="submit"
                    class="px-4 py-2 bg-amber-700 text-white rounded-lg hover:bg-amber-800">Simpan</button>
            </div>

        </form>
    </div>

</x-layouts.admin-layout>
