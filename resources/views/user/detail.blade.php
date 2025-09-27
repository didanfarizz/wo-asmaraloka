<x-layouts.app title="{{ $item->package_name }}">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        <div class="flex flex-col md:flex-row gap-10">
            <div class="md:w-1/2">
                <img src="{{ asset('images/' . $item->image) }}" alt="{{ $item->package_name }}" class="rounded shadow">
            </div>

            <div class="md:w-1/2">
                <h2 class="text-3xl font-bold text-stone-800 mb-4">{{ $item->package_name }}</h2>
                <p class="text-amber-700 font-semibold mb-2">Rp{{ number_format($item->price, 0, ',', '.') }}</p>
                <p class="text-stone-500 mb-6">{{ $item->description }}</p>

                <a href="{{ route('pesan.form', $item->catalogue_id) }}"
                    class="px-4 py-2 bg-amber-700 text-white rounded hover:bg-amber-800">
                    Pesan Paket Ini
                </a>
            </div>
        </div>
    </div>
</x-layouts.app>
