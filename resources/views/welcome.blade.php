<x-guest-layout>
    <div class="bg-gray-50 min-h-screen">

        {{-- HERO --}}
        <section class="bg-white">
            <div class="max-w-7xl mx-auto px-6 py-16 text-center">
                <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900">
                    Welcome to <span class="text-red-600">Eyetec Computers</span>
                </h1>

                <p class="mt-4 text-gray-600 text-lg">
                    Computers, accessories & tech essentials at the best prices
                </p>

                <div class="mt-8 flex justify-center gap-4">
                    <a href="{{ route('products') }}"
                       class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg font-semibold">
                        Browse Products
                    </a>

                    @guest
                        <a href="{{ route('login') }}"
                           class="border border-gray-300 px-6 py-3 rounded-lg hover:bg-gray-100">
                            Login
                        </a>
                    @endguest
                </div>
            </div>
        </section>

        {{-- FEATURES --}}
        <section class="max-w-7xl mx-auto px-6 py-16 grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-xl shadow text-center">
                <h3 class="font-bold text-lg mb-2">Affordable Prices</h3>
                <p class="text-gray-600 text-sm">Best deals on quality products</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow text-center">
                <h3 class="font-bold text-lg mb-2">Fast Checkout</h3>
                <p class="text-gray-600 text-sm">Simple prototype checkout flow</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow text-center">
                <h3 class="font-bold text-lg mb-2">Admin Management</h3>
                <p class="text-gray-600 text-sm">Manage products & orders easily</p>
            </div>
        </section>

    </div>
</x-guest-layout>
