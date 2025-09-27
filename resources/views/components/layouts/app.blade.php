<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'SiTimbang' }}</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-50 text-gray-800 min-h-screen flex flex-col">

    <!-- Navbar -->
    <x-navbar />

    <!-- Content -->
    <main class="flex-1 container mx-auto px-6 py-10">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <x-footer />
</body>

</html>
