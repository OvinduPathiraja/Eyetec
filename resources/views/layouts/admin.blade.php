<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel - {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

<div class="flex min-h-screen">

    {{-- SIDEBAR --}}
    <aside class="w-64 bg-white border-r">
        <div class="p-6 font-bold text-red-600 text-xl">
            Admin Panel
        </div>

        <nav class="px-4 text-sm space-y-2">
            <a href="{{ route('admin.dashboard') }}" class="block px-3 py-2 rounded hover:bg-gray-100">
                Dashboard
            </a>
            <a href="{{ route('admin.products') }}" class="block px-3 py-2 rounded hover:bg-gray-100">
                Products
            </a>
            <a href="{{ route('admin.orders') }}" class="block px-3 py-2 rounded hover:bg-gray-100">
                Orders
            </a>

            <form method="POST" action="{{ route('logout') }}" class="mt-6">
                @csrf
                <button class="w-full text-left px-3 py-2 rounded hover:bg-gray-100 text-red-600">
                    Logout
                </button>
            </form>
        </nav>
    </aside>

    {{-- CONTENT --}}
    <main class="flex-1 p-8">
        {{ $slot }}
    </main>

</div>

</body>
</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

<div class="flex min-h-screen">

    {{-- SIDEBAR --}}
    @include('admin.partials.sidebar')

    {{-- MAIN --}}
    <div class="flex-1">
        @include('admin.partials.topbar')

        <main class="p-6">
            @yield('content')
        </main>
    </div>

</div>

</body>
</html>
