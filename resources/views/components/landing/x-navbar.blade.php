{{-- resources/views/components/navbar.blade.php --}}

@props(['active' => '', 'type' => 'landing']) @php
    // Definisikan menu berdasarkan tipe dan status otentikasi
    $menuItems = match ($type) {
        'landing' => [
            'guest' => [
                ['href' => '#home', 'label' => 'Home', 'active' => $active === 'home'],
                ['href' => '#features', 'label' => 'Fitur', 'active' => $active === 'features'],
                ['href' => '#demo', 'label' => 'Demo', 'active' => $active === 'demo'],
            ],
            'auth' => [
                ['href' => route('home'), 'label' => 'POS'],
                ['href' => route('transactions.index'), 'label' => 'Transactions'],
                ['href' => route('dashboard'), 'label' => 'Dashboard'],
            ],
        ],
        'pos' => [
            // Menu untuk 'pos' hanya untuk user yang terotentikasi
            'auth' => [['href' => route('dashboard'), 'label' => 'Dashboard']],
        ],
        default => [],
    };
@endphp

<nav x-data="{ isOpen: false, isScrolled: false }" @scroll.window="isScrolled = (window.pageYOffset > 50)"
    class="bg-white shadow-sm transition-all duration-300" :class="{ 'navbar-sticky': isScrolled }">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-4">
            <a href="{{ route('landing') }}" wire:navigate class="flex items-center space-x-2">
                <div class="w-10 h-10 bg-green-600 rounded-lg flex items-center justify-center">
                    <i class="fas fa-cash-register text-white text-xl"></i>
                </div>
                <span class="text-xl font-bold text-gray-900">POS Minimarket</span>
            </a>

            <div class="hidden md:flex items-center space-x-6">
                @if ($type === 'landing')
                    @guest
                        @foreach ($menuItems['guest'] as $item)
                            <a href="{{ $item['href'] }}"
                                class="nav-link {{ $item['active'] ? 'text-green-600 font-semibold' : 'text-gray-700 hover:text-green-600' }}">
                                {{ $item['label'] }}
                            </a>
                        @endforeach

                        <a href="{{ route('login') }}"
                            class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition-all duration-200 font-medium">
                            Login
                        </a>
                    @endguest

                    @auth
                        @foreach ($menuItems['auth'] as $item)
                            <a href="{{ $item['href'] }}" wire:navigate class="nav-link">
                                {{ $item['label'] }}
                            </a>
                        @endforeach

                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="nav-link flex items-center">
                                <i class="fas fa-sign-out-alt mr-1"></i>
                                Logout
                            </button>
                        </form>
                    @endauth
                @else
                    {{-- type === 'pos' --}}
                    @auth
                        @foreach ($menuItems['auth'] as $item)
                            <a href="{{ $item['href'] }}" wire:navigate class="nav-link">
                                {{ $item['label'] }}
                            </a>
                        @endforeach

                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="nav-link flex items-center">
                                <i class="fas fa-sign-out-alt mr-1"></i>
                                Logout
                            </button>
                        </form>
                    @endauth
                @endif
            </div>

            <button @click="isOpen = !isOpen"
                class="md:hidden p-2 text-gray-700 hover:text-green-600 hover:bg-gray-100 rounded-lg transition-colors">
                <i class="fas fa-bars text-lg"></i>
            </button>
        </div>

        <div x-show="isOpen" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform -translate-y-2"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform translate-y-0"
            x-transition:leave-end="opacity-0 transform -translate-y-2"
            class="md:hidden border-t border-gray-200 pt-4 pb-2" @click.away="isOpen = false">

            @if ($type === 'landing')
                @guest
                    @foreach ($menuItems['guest'] as $item)
                        <a href="{{ $item['href'] }}" @click="isOpen = false"
                            class="mobile-nav-link {{ $item['active'] ? 'text-green-600 font-semibold' : '' }}">
                            {{ $item['label'] }}
                        </a>
                    @endforeach

                    <div class="mt-4 pt-4 border-t border-gray-200">
                        <a href="{{ route('login') }}"
                            class="block w-full bg-green-600 text-white px-4 py-3 rounded-lg hover:bg-green-700 transition-colors text-center font-medium">
                            Login
                        </a>
                    </div>
                @endguest

                @auth
                    @foreach ($menuItems['auth'] as $item)
                        <a href="{{ $item['href'] }}" wire:navigate @click="isOpen = false" class="mobile-nav-link">
                            {{ $item['label'] }}
                        </a>
                    @endforeach

                    <div class="mt-4 pt-4 border-t border-gray-200">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="mobile-nav-link w-full text-left flex items-center">
                                <i class="fas fa-sign-out-alt mr-2"></i>
                                Logout
                            </button>
                        </form>
                    </div>
                @endauth
            @else
                {{-- type === 'pos' --}}
                @auth
                    @foreach ($menuItems['auth'] as $item)
                        <a href="{{ $item['href'] }}" wire:navigate @click="isOpen = false" class="mobile-nav-link">
                            {{ $item['label'] }}
                        </a>
                    @endforeach

                    <div class="mt-4 pt-4 border-t border-gray-200">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="mobile-nav-link w-full text-left flex items-center">
                                <i class="fas fa-sign-out-alt mr-2"></i>
                                Logout
                            </button>
                        </form>
                    </div>
                @endauth
            @endif
        </div>
    </div>
</nav>

{{-- Pastikan Anda memiliki style ini di file CSS utama atau di dalam komponen --}}
<style>
    .nav-link {
        @apply text-gray-700 hover:text-green-600 transition-colors duration-200 px-3 py-2 rounded-md hover:bg-gray-50;
    }

    .mobile-nav-link {
        @apply block text-gray-700 hover:text-green-600 transition-colors duration-200 px-3 py-2 rounded-md hover:bg-gray-50 text-base;
    }

    .navbar-sticky {
        @apply fixed top-0 left-0 right-0 z-50 shadow-lg bg-white/95 backdrop-blur-sm;
    }
</style>
