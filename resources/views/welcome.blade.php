<x-guest-layout>
    <div class="bg-gray-50 min-h-screen">

        {{-- HERO --}}
        <section class="relative overflow-hidden bg-gradient-to-br from-slate-900 via-slate-800 to-rose-900 text-white">
            <div class="absolute inset-0 opacity-30">
                <div class="absolute -top-24 -right-24 h-80 w-80 rounded-full bg-rose-500 blur-3xl"></div>
                <div class="absolute -bottom-28 -left-16 h-72 w-72 rounded-full bg-cyan-400 blur-3xl"></div>
            </div>

            <div class="relative max-w-7xl mx-auto px-6 py-16 md:py-20">
                <div class="max-w-2xl mx-auto text-center">
                    <p class="text-sm uppercase tracking-[0.2em] text-rose-200">EyeTec Computers</p>
                    <h1 class="mt-4 text-4xl md:text-5xl font-extrabold leading-tight">
                        Welcome to <span class="text-rose-300">EyeTec Computers 12</span>
                    </h1>
                    <p class="mt-4 text-lg text-slate-200">
                        Enhance your setup with premium accessories, quick delivery, and unbeatable value.
                    </p>

                    <div class="mt-8 flex flex-wrap justify-center gap-4">
                        <a href="{{ route('products') }}"
                           class="bg-rose-500 hover:bg-rose-600 text-white px-6 py-3 rounded-lg font-semibold shadow-lg shadow-rose-900/30">
                            Shop Now
                        </a>

                        @guest
                            <a href="{{ route('login') }}"
                               class="border border-white/40 text-white px-6 py-3 rounded-lg hover:bg-white/10">
                                Login
                            </a>
                        @endguest
                    </div>
                </div>
            </div>
        </section>

        {{-- FEATURED PRODUCTS --}}
        <section class="max-w-7xl mx-auto px-6 py-14">
            <div class="text-center mb-10">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900">Featured Products</h2>
                <p class="text-gray-600 mt-2">
                    Explore our top selling computer products and accessories
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse($featuredProducts as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-lg transition flex flex-col">
                        <div class="bg-gray-100 h-44 flex items-center justify-center">
                            <img
                                src="{{ $product->image && file_exists(public_path($product->image))
                                    ? asset($product->image)
                                    : asset('images/placeholder.png') }}"
                                class="h-28 w-28 object-contain"
                                alt="{{ $product->product_name }}"
                                loading="lazy"
                            >
                        </div>

                        <div class="p-4 flex flex-col flex-1">
                            <h3 class="font-semibold text-sm text-gray-900">
                                {{ $product->product_name }}
                            </h3>
                            <p class="text-xs text-gray-500 mt-2 line-clamp-2">
                                {{ $product->description }}
                            </p>

                            <div class="mt-4 flex items-center justify-between">
                                <span class="text-rose-600 font-bold text-sm">
                                    LKR {{ number_format($product->price, 2) }}
                                </span>
                                <a href="{{ route('products.details', $product->id) }}"
                                   class="text-xs text-rose-600 hover:text-rose-700 font-semibold">
                                    Shop Now
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="col-span-full text-center text-gray-500">
                        No featured products available.
                    </p>
                @endforelse
            </div>
        </section>

        {{-- WHY CHOOSE --}}
        <section class="bg-gray-100">
            <div class="max-w-7xl mx-auto px-6 py-14">
                <div class="text-center mb-10">
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900">
                        Why Choose Eyetec Computers?
                    </h2>
                    <p class="text-gray-600 mt-2">
                        Experience our best selling computers and accessories
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="bg-white rounded-xl p-6 shadow-sm text-center">
                        <h3 class="font-semibold text-gray-900">Affordable Prices</h3>
                        <p class="text-sm text-gray-600 mt-2">
                            Competitive pricing across all our products and accessories.
                        </p>
                    </div>

                    <div class="bg-white rounded-xl p-6 shadow-sm text-center">
                        <h3 class="font-semibold text-gray-900">Fast Delivery</h3>
                        <p class="text-sm text-gray-600 mt-2">
                            Quick and reliable shipping to your doorstep.
                        </p>
                    </div>

                    <div class="bg-white rounded-xl p-6 shadow-sm text-center">
                        <h3 class="font-semibold text-gray-900">Warranty Support</h3>
                        <p class="text-sm text-gray-600 mt-2">
                            Comprehensive warranty and dedicated customer support.
                        </p>
                    </div>

                    <div class="bg-white rounded-xl p-6 shadow-sm text-center">
                        <h3 class="font-semibold text-gray-900">Trusted Brand</h3>
                        <p class="text-sm text-gray-600 mt-2">
                            Industry-leading reputation and customer satisfaction.
                        </p>
                    </div>
                </div>
            </div>
        </section>

    </div>
</x-guest-layout>
