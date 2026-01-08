<nav class="bg-white border-b">
    <div class="max-w-7xl mx-auto px-4 py-3 flex items-center">

        {{-- LOGO --}}
        <div class="flex items-center">
            <a href="{{ route('home') }}" class="font-bold text-xl text-red-600">
                Eyetec
            </a>
        </div>

        {{-- CENTER LINKS --}}
        <div class="flex-1 flex items-center justify-center gap-6 text-sm">
            @if(auth()->check() && auth()->user()->role === 'admin')
                <a href="{{ route('admin.dashboard') }}" class="hover:text-red-600">
                    Dashboard
                </a>

                <a href="{{ route('admin.blogs.index') }}" class="hover:text-red-600">
                    Manage Blogs
                </a>
            @else
                <a href="{{ route('products') }}" class="hover:text-red-600">
                    Products
                </a>

                <a href="{{ route('blogs.index') }}" class="hover:text-red-600">
                    Blog
                </a>

                <a href="{{ route('about') }}" class="hover:text-red-600">
                    About
                </a>
            @endif
        </div>

        {{-- RIGHT AUTH LINKS --}}
        <div class="flex items-center gap-4 text-sm">
            @auth
                <a href="{{ route('cart.index') }}" class="hover:text-red-600">
                    Cart
                </a>

                <a href="{{ route('orders.my') }}" class="hover:text-red-600">
                    My Orders
                </a>

                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}"
                       class="text-red-600 font-semibold">
                        Admin
                    </a>

                    <a href="{{ route('admin.blogs.index') }}" class="hover:text-red-600">
                        Manage Blogs
                    </a>
                @endif

                <a href="{{ url('/user/profile') }}" class="hover:text-red-600">
                    Profile
                </a>

                {{-- LOGOUT --}}
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="hover:text-red-600">
                        Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="hover:text-red-600">
                    Login
                </a>

                <a href="{{ route('register') }}"
                   class="bg-red-600 text-white px-3 py-1 rounded">
                    Register
                </a>
            @endauth
        </div>
    </div>
</nav>
