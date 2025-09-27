@php
    $navItems = [
        ['route' => 'admin.dashboard', 'label' => 'Dashboard', 'icon' => 'fa-tachometer-alt'],
        ['route' => 'admin.katalog.index', 'label' => 'Katalog', 'icon' => 'fa-box-open'],
        ['route' => 'admin.pemesanan', 'label' => 'Pemesanan', 'icon' => 'fa-scroll'],
        ['route' => 'admin.settings.index', 'label' => 'Settings', 'icon' => 'fa-scroll'],
        ['route' => 'admin.laporan', 'label' => 'Laporan', 'icon' => 'fa-file-alt'],
    ];
    $currentRoute = Route::currentRouteName();
@endphp

<div class="w-64 bg-stone-900 h-screen fixed top-0 left-0 flex flex-col shadow-2xl">

    <div class="py-5 px-6 text-center border-b border-amber-700">
        <span class="text-2xl font-extrabold text-amber-500 tracking-widest font-serif">ASMARALOKA</span>
    </div>

    <nav class="flex-grow p-4 space-y-2">
        @foreach ($navItems as $item)
            <a href="{{ route($item['route']) }}"
                class="flex items-center p-3 rounded-lg font-medium transition duration-200
                      {{ $currentRoute === $item['route'] ? 'bg-amber-700 text-white' : 'text-stone-300 hover:bg-stone-700 hover:text-amber-500' }}">
                {{-- <i class="fas {{ $item['icon'] }} w-5 mr-3"></i> --}}
                <span>{{ $item['label'] }}</span>
            </a>
        @endforeach
    </nav>

    <div class="p-4 border-t border-stone-700">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"
                class="w-full text-left p-3 rounded-lg text-stone-300 hover:bg-red-700 hover:text-white transition duration-200 font-medium">
                Logout
            </button>
        </form>
    </div>
</div>
