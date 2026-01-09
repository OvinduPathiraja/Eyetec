<x-guest-layout>
    <main class="min-h-screen bg-gray-100">
        <!-- Hero Section -->
        <section class="relative h-72 md:h-96 flex items-center justify-center" style="background-color: #151c28;">
            <!-- Banner Image Overlay -->
            <img src="{{ asset('images/images/banner2.webp') }}" alt="Banner" class="absolute inset-0 w-full h-full object-cover opacity-70 z-0" style="pointer-events: none;" />
            <div class="relative w-full h-full flex flex-col items-center justify-center text-center z-10">
                <h1 class="text-3xl md:text-5xl font-bold mb-2 text-white font-montserrat text-center">
                    About <span class="text-red-600">Eye - Tec</span> Computers
                </h1>
                <p class="text-base md:text-xl text-white font-poppins text-center mt-2">Your trusted destination for computers and accessories</p>
            </div>
        </section>

        <!-- Our Story -->
        <section class="bg-white py-12">
            <div class="container mx-auto px-4 md:px-8">
                <h2 class="text-2xl font-bold text-center mb-4" style="font-family: 'Poppins', sans-serif;">Our Story</h2>
                <div class="flex justify-center mb-6">
                    <span class="w-16 h-1 bg-red-500 rounded"></span>
                </div>
                <p class="text-gray-700 text-base text-center max-w-3xl mx-auto mb-4">
                    Founded in 2010, <a href="https://eyetec.lk" class="text-red-500 font-semibold hover:underline" target="_blank">Eyetec Computers</a> has grown into a trusted name in the world of computer technology and accessories. From humble beginnings, we set out with a clear vision: to make high-performance technology affordable and accessible to everyone. Over the years, we've proudly served individuals, businesses, and tech enthusiasts with products that inspire innovation and productivity.
                </p>
                <p class="text-gray-700 text-base text-center max-w-3xl mx-auto">
                    We stand on the values of <span class="font-semibold text-red-500">innovation</span> that fuels creativity, <span class="font-semibold text-red-500">quality</span> that guarantees reliability, and <span class="font-semibold text-red-500">trust</span> that builds lasting connections with our customers. With a strong commitment to excellence, Eyetec Computers continues to be your go-to choice for cutting-edge computers, accessories, and unmatched customer service.
                </p>
            </div>
        </section>

        <!-- Mission & Values -->
        <section class="bg-gray-100 py-12">
            <div class="container mx-auto px-4 md:px-8">
                <h2 class="text-2xl font-bold text-center mb-4" style="font-family: 'Poppins', sans-serif;">Our Mission &amp; Values</h2>
                <div class="flex justify-center mb-6">
                    <span class="w-16 h-1 bg-red-500 rounded"></span>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center">
                        <div class="bg-red-600 rounded-full flex items-center justify-center h-16 w-16 mb-5">
                            <img src="{{ asset('images/icons/customerr.webp') }}" alt="Customer First" class="h-8 w-8">
                        </div>
                        <h3 class="font-bold text-lg mb-2 text-gray-900 text-center" style="font-family: 'Poppins', sans-serif;">Customer First</h3>
                        <p class="text-gray-600 text-sm text-center">Your satisfaction is our priority. We listen, respond, and deliver solutions that enhance your experience.</p>
                    </div>
                    <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center">
                        <div class="bg-red-600 rounded-full flex items-center justify-center h-16 w-16 mb-5">
                            <img src="{{ asset('images/icons/tech.webp') }}" alt="Cutting-Edge Tech" class="h-8 w-8">
                        </div>
                        <h3 class="font-bold text-lg mb-2 text-gray-900 text-center" style="font-family: 'Poppins', sans-serif;">Cutting-Edge Tech</h3>
                        <p class="text-gray-600 text-sm text-center">We bring you the latest innovations in computers and accessories, always ahead of the curve.</p>
                    </div>
                    <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center">
                        <div class="bg-red-600 rounded-full flex items-center justify-center h-16 w-16 mb-5">
                            <img src="{{ asset('images/icons/dollarr.webp') }}" alt="Affordable Prices" class="h-8 w-8">
                        </div>
                        <h3 class="font-bold text-lg mb-2 text-gray-900 text-center" style="font-family: 'Poppins', sans-serif;">Affordable Prices</h3>
                        <p class="text-gray-600 text-sm text-center">Quality technology at prices everyone can afford. We believe in value without compromise.</p>
                    </div>
                    <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center">
                        <div class="bg-red-600 rounded-full flex items-center justify-center h-16 w-16 mb-5">
                            <img src="{{ asset('images/icons/support.webp') }}" alt="Reliable Support" class="h-8 w-8">
                        </div>
                        <h3 class="font-bold text-lg mb-2 text-gray-900 text-center" style="font-family: 'Poppins', sans-serif;">Reliable Support</h3>
                        <p class="text-gray-600 text-sm text-center">Our expert team provides ongoing support and guidance, ensuring you get the most from your technology.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Brands Section -->
        <section class="bg-white py-12">
            <div class="container mx-auto px-4 md:px-8">
                <h2 class="text-2xl font-bold text-center mb-4" style="font-family: 'Poppins', sans-serif;">Our Authorized Dealers</h2>
                <div class="flex justify-center mb-6">
                    <span class="w-16 h-1 bg-red-500 rounded"></span>
                </div>
                <p class="text-gray-700 text-center mb-8">At Eyetec Computers, we partner with leading global brands to bring you authentic, high-performance products you can trust.</p>
                <div class="flex flex-wrap justify-center items-center gap-8">
                    <img src="{{ asset('images/icons/intel.webp') }}" alt="Intel" class="h-20 w-auto">
                    <img src="{{ asset('images/icons/hp.webp') }}" alt="AMD" class="h-20 w-auto">
                    <img src="{{ asset('images/icons/nvidia.webp') }}" alt="Nvidia" class="h-20 w-auto">
                    <img src="{{ asset('images/icons/msi.webp') }}" alt="MSI" class="h-20 w-auto">
                    <img src="{{ asset('images/icons/asus.webp') }}" alt="ASUS" class="h-20 w-auto">
                    <img src="{{ asset('images/icons/gigabyte.png') }}" alt="Gigabyte" class="h-20 w-auto">
                    <img src="{{ asset('images/icons/dell.webp') }}" alt="Kingston" class="h-20 w-auto">
                    <img src="{{ asset('images/icons/samsung.webp') }}" alt="Samsung" class="h-20 w-auto">
                </div>
            </div>
        </section>
    </main>
</x-guest-layout>