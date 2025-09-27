<x-layouts.admin-layout title="Settings">

    <div class="max-w-3xl mx-auto bg-white p-6 rounded-xl shadow-xl border border-stone-200">

        @if (session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block mb-1 font-medium">Nomor Telepon</label>
                <input type="text" name="phone_number" value="{{ old('phone_number', $setting->phone_number ?? '') }}"
                    class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:ring-amber-300">
            </div>

            <div>
                <label class="block mb-1 font-medium">Email</label>
                <input type="email" name="email" value="{{ old('email', $setting->email ?? '') }}"
                    class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:ring-amber-300">
            </div>

            <div>
                <label class="block mb-1 font-medium">Alamat</label>
                <textarea name="address" rows="3"
                    class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:ring-amber-300">{{ old('address', $setting->address ?? '') }}</textarea>
            </div>

            <div>
                <label class="block mb-1 font-medium">Instagram URL</label>
                <input type="url" name="instagram_url"
                    value="{{ old('instagram_url', $setting->instagram_url ?? '') }}"
                    class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:ring-amber-300">
            </div>

            <div>
                <label class="block mb-1 font-medium">WhatsApp URL</label>
                <input type="url" name="whatsapp_url"
                    value="{{ old('whatsapp_url', $setting->whatsapp_url ?? '') }}"
                    class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:ring-amber-300">
            </div>

            <button type="submit" class="px-4 py-2 bg-amber-700 text-white rounded hover:bg-amber-800">
                Simpan
            </button>
        </form>

    </div>

</x-layouts.admin-layout>
