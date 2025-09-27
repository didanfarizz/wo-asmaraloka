<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Login' }} - Luvira</title>
    @vite('resources/css/app.css')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLMDJqWzVd4h8h8Y/L9+XQ2jH6S2g8WpB5j/bJ4WvB93y0Fj7/N18sA..." crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-[#F9F6F3] text-[#5A4737] flex justify-center items-center">
    <main class="flex-grow flex items-center justify-center">
        {{ $slot }}
    </main>

    <footer class="bg-stone-800 text-stone-300 py-4 text-center">
        © 2024 Luvira. All rights reserved.
    </footer>
</body>

</html>