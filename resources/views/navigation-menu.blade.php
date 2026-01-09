<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <!-- <a href="{{ route('products') }}">
                        <x-application-mark class="block h-9 w-auto" />
                    </a> -->
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    @if(auth()->user()->role === 'admin')
                    <x-nav-link href="{{ route('admin.dashboard') }}" :active="request()->routeIs('admin.dashboard')">
                        Dashboard
                    </x-nav-link>

                    <x-nav-link href="{{ route('admin.blogs.index') }}" :active="request()->routeIs('admin.blogs.*')">
                        Manage Blogs
                    </x-nav-link>
                    @else
                    <x-nav-link href="{{ route('products') }}" :active="request()->routeIs('products*')">
                        Products
                    </x-nav-link>

                    <x-nav-link href="{{ route('blogs.index') }}" :active="request()->routeIs('blogs*')">
                        Blog
                    </x-nav-link>

                    <x-nav-link href="{{ route('cart.index') }}" :active="request()->routeIs('cart.*')">
                        Cart
                    </x-nav-link>

                    <x-nav-link href="{{ route('orders.my') }}" :active="request()->routeIs('orders.my')">
                        My Orders
                    </x-nav-link>

                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        Dashboard
                    </x-nav-link>
                    @endif
                </div>
            </div>

            <!-- Right Side -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                <div class="ms-3 relative">
                    <x-dropdown align="right" width="60">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-500 bg-white hover:text-gray-700">
                                {{ Auth::user()->currentTeam->name }}
                                <svg class="ms-2 size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                Team Settings
                            </x-dropdown-link>

                            @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                            <x-dropdown-link href="{{ route('teams.create') }}">
                                Create New Team
                            </x-dropdown-link>
                            @endcan
                        </x-slot>
                    </x-dropdown>
                </div>
                @endif

                <!-- User Dropdown -->
                <div class="ms-3 relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex text-sm rounded-full focus:outline-none">
                                <img class="size-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" />
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link href="{{ route('profile.show') }}">
                                Profile
                            </x-dropdown-link>

                            <div class="border-t border-gray-200"></div>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link href="{{ route('logout') }}"
                                    @click.prevent="$root.submit();">
                                    Log Out
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>

                <!-- Quick logout button -->
                <form method="POST" action="{{ route('logout') }}" class="ms-3">
                    @csrf
                    <button class="text-sm text-gray-600 hover:text-gray-800">
                        Logout
                    </button>
                </form>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:bg-gray-100">
                    <svg class="size-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open}" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open}" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <x-responsive-nav-link href="{{ route('products') }}">
            Products
        </x-responsive-nav-link>

        <x-responsive-nav-link href="{{ route('blogs.index') }}">
            Blog
        </x-responsive-nav-link>

        <x-responsive-nav-link href="{{ route('cart.index') }}">
            Cart
        </x-responsive-nav-link>

        <x-responsive-nav-link href="{{ route('orders.my') }}">
            My Orders
        </x-responsive-nav-link>

        <x-responsive-nav-link href="{{ route('dashboard') }}">
            Dashboard
        </x-responsive-nav-link>

        @if(auth()->user()->role === 'admin')
        <x-responsive-nav-link href="{{ route('admin.dashboard') }}">
            Dashboard
        </x-responsive-nav-link>

        <x-responsive-nav-link href="{{ route('admin.blogs.index') }}">
            Manage Blogs
        </x-responsive-nav-link>
        @endif

        <div class="border-t border-gray-200 mt-2">
            <x-responsive-nav-link href="{{ route('profile.show') }}">
                Profile
            </x-responsive-nav-link>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-responsive-nav-link href="{{ route('logout') }}"
                    @click.prevent="$root.submit();">
                    Log Out
                </x-responsive-nav-link>
            </form>
        </div>
    </div>
</nav>