<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Dashboard' }} | LUVIRA Admin</title>
    @vite('resources/css/app.css') {{-- Pastikan vite atau mix sudah dikonfigurasi --}}
</head>
<body class="bg-stone-100">

    {{-- 1. Sidebar --}}
    <x-admin-sidebar/>

    {{-- 2. Konten Utama (Main Content) --}}
    <div class="ml-64 p-8">
        {{-- Header Konten --}}
        <header class="mb-8 border-b pb-4 border-stone-300">
            <h1 class="text-3xl font-bold text-stone-800">{{ $title ?? 'Dashboard' }}</h1>
        </header>

        {{-- Slot Konten --}}
        <main>
            {{ $slot }}
        </main>
    </div>
    
</body>
</html>