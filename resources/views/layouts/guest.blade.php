<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Eyetec Computers') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-900">

{{-- NAVBAR --}}
<!-- <nav class="bg-white border-b shadow-sm">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
        <a href="{{ route('home') }}" class="text-xl font-bold text-red-600">
            Eyetec Computers
        </a>

        <div class="flex gap-4 text-sm">
            <a href="{{ route('products') }}" class="hover:text-red-600">Products</a>

            @auth
                <a href="{{ route('dashboard') }}" class="hover:text-red-600">Dashboard</a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="hover:text-red-600">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="hover:text-red-600">Login</a>
                <a href="{{ route('register') }}" class="hover:text-red-600">Register</a>
            @endauth
        </div>
    </div>
</nav> -->

@include('components.navigation')
{{ $slot }}

<!-- 
{{-- PAGE CONTENT --}}
<main class="min-h-screen">
    {{ $slot }}
</main> -->

{{-- FOOTER --}}
<footer class="bg-white border-t mt-16">
    <div class="max-w-7xl mx-auto px-4 py-6 text-sm text-gray-500 text-center">
        © {{ date('Y') }} Eyetec Computers. All rights reserved.
    </div>
</footer>

</body>
</html>
