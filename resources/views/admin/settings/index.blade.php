<x-layouts.admin-layout title="Settings">

    <div class="bg-white p-6 rounded-xl shadow-xl border border-stone-200 overflow-x-auto">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-xl font-bold">Daftar Settings</h1>
            <a href="{{ route('admin.settings.create') }}" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                Tambah Setting
            </a>
        </div>

        <table class="min-w-full divide-y divide-stone-200">
            <thead class="bg-stone-50">
                <tr>
                    <th class="px-6 py-3 text-left">No</th>
                    <th class="px-6 py-3 text-left">Phone</th>
                    <th class="px-6 py-3 text-left">Email</th>
                    <th class="px-6 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($settings as $index => $setting)
                    <tr>
                        <td class="px-6 py-4">{{ $index + 1 }}</td>
                        <td class="px-6 py-4">{{ $setting->phone_number }}</td>
                        <td class="px-6 py-4">{{ $setting->email }}</td>
                        <td class="flex gap-2 justify-center py-3">
                            {{-- Tombol Edit --}}
                            <a href="{{ route('admin.settings.edit', $setting->setting_id) }}"
                               class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700">
                               Edit
                            </a>

                            {{-- Tombol Hapus --}}
                            <form action="{{ route('admin.settings.destroy', $setting->setting_id) }}" method="POST" onsubmit="return confirm('Yakin hapus?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-layouts.admin-layout>
