@props([
    'title' => '',
])
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} - Laravel</title>
    @vite(['resources/css/app.css'])
</head>

<body>
    <header class="bg-gray-500 text-white">
        <h1 class="px-2 py-1">Laravel</h1>
        <nav class="bg-gray-700">
            <ul class="flex space-x-4 px-2 py-1">
                <li>
                    <a @if (request()->routeIs('tableau')) class="text-orange-400 font-bold" @endif
                        href="{{ route('tableau') }}">Tableau</a>
                </li>
            </ul>
        </nav>
    </header>
    <main class="p-2">
        {{ $slot }}
    </main>
    <footer class="px-2 py-1 bg-gray-900 text-white text-sm text-center">
        made with laravel
    </footer>
</body>

</html>
