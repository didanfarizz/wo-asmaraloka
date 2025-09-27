<x-layouts.admin-layout title="Edit Setting">

    <div class="max-w-2xl mx-auto bg-white p-6 rounded-xl shadow-xl border border-stone-200">
        <h1 class="text-2xl font-bold mb-6">Edit Setting</h1>

        <form action="{{ route('admin.settings.update', $setting->setting_id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block mb-1 font-medium">Telepon</label>
                <input type="text" name="phone_number" value="{{ $setting->phone_number }}" required
                    class="w-full px-3 py-2 border rounded">
            </div>

            <div>
                <label class="block mb-1 font-medium">Email</label>
                <input type="email" name="email" value="{{ $setting->email }}" required
                    class="w-full px-3 py-2 border rounded">
            </div>

            <div>
                <label class="block mb-1 font-medium">Alamat</label>
                <textarea name="address" class="w-full px-3 py-2 border rounded">{{ $setting->address }}</textarea>
            </div>

            <div>
                <label class="block mb-1 font-medium">Instagram URL</label>
                <input type="url" name="instagram_url" value="{{ $setting->instagram_url }}"
                    class="w-full px-3 py-2 border rounded">
            </div>

            <div>
                <label class="block mb-1 font-medium">WhatsApp URL</label>
                <input type="url" name="whatsapp_url" value="{{ $setting->whatsapp_url }}"
                    class="w-full px-3 py-2 border rounded">
            </div>

            <button type="submit" class="px-4 py-2 bg-amber-700 text-white rounded hover:bg-amber-800">Update</button>
        </form>
    </div>

</x-layouts.admin-layout>
