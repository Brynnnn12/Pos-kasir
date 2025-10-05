<!-- Sidebar Desktop -->
<div class="w-64 bg-blue-800 h-screen text-white p-4 hidden md:flex md:flex-col">
    <div class="text-2xl font-bold mb-8 mt-4 flex items-center justify-center flex-shrink-0">
        <i class="fas fa-chart-line mr-2"></i>
        <a href="{{ route('home') }}" wire:navigate class="text-white">Dashboard</a>
    </div>

    <nav class="flex-1 overflow-y-auto">
        <a href="{{ route('dashboard') }}" wire:navigate
            class="flex items-center p-3 rounded-lg mb-2 transition-all hover:bg-blue-700 cursor-pointer {{ request()->routeIs('dashboard') ? 'bg-blue-700' : '' }}">
            <i class="fas fa-home mr-3"></i>
            <span>Overview</span>
        </a>
        <a href="{{ route('categories.index') }}" wire:navigate
            class="flex items-center p-3 rounded-lg mb-2 transition-all hover:bg-blue-700 cursor-pointer {{ request()->routeIs('categories.*') ? 'bg-blue-700' : '' }}">
            <i class="fas fa-th mr-3"></i>
            <span>Categories</span>
        </a>
        <a href="{{ route('products.index') }}" wire:navigate
            class="flex items-center p-3 rounded-lg mb-2 transition-all hover:bg-blue-700 cursor-pointer {{ request()->routeIs('products.*') ? 'bg-blue-700' : '' }}">
            <i class="fas fa-box mr-3"></i>
            <span>Products</span>
        </a>
        <a href="{{ route('sales.index') }}" wire:navigate
            class="flex items-center p-3 rounded-lg mb-2 transition-all hover:bg-blue-700 cursor-pointer {{ request()->routeIs('sales.*') ? 'bg-blue-700' : '' }}">
            <i class="fas fa-shopping-cart mr-3"></i>
            <span>Sales</span>
        </a>
        <a href="{{ route('sale-items.index') }}" wire:navigate
            class="flex items-center p-3 rounded-lg mb-2 transition-all hover:bg-blue-700 cursor-pointer {{ request()->routeIs('sale-items.*') ? 'bg-blue-700' : '' }}"
            @click="isSidebarOpen = false">
            <i class="fas fa-shopping-cart mr-3"></i>
            <span>Sale Items</span>
        </a>
        <a href="{{ route('transactions.index') }}" wire:navigate
            class="flex items-center p-3 rounded-lg mb-2 transition-all hover:bg-blue-700 cursor-pointer {{ request()->routeIs('transactions.*') ? 'bg-blue-700' : '' }}">
            <i class="fas fa-receipt mr-3"></i>
            <span>Transactions</span>
        </a>
        <a href="{{ route('profile.edit') }}" wire:navigate
            class="flex items-center p-3 rounded-lg mb-2 transition-all hover:bg-blue-700 cursor-pointer {{ request()->routeIs('profile.*') ? 'bg-blue-700' : '' }}">
            <i class="fas fa-user mr-3"></i>
            <span>Profile</span>
        </a>
        <a href="{{ route('settings.index') }}" wire:navigate
            class="flex items-center p-3 rounded-lg mb-2 transition-all hover:bg-blue-700 cursor-pointer {{ request()->routeIs('settings.*') ? 'bg-blue-700' : '' }}">
            <i class="fas fa-cog mr-3"></i>
            <span>Settings</span>
        </a>
    </nav>

    <div class="mt-8 pt-8 border-t border-blue-700 flex-shrink-0">
        <div class="flex items-center mb-4">
            <div class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center">
                <span class="font-bold">{{ substr(Auth::user()->name, 0, 1) }}</span>
            </div>
            <div class="ml-3">
                <p class="font-medium">{{ Auth::user()->name }}</p>
                <p class="text-xs text-blue-300">{{ Auth::user()->email }}</p>
            </div>
        </div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"
                class="flex items-center p-3 rounded-lg transition-all hover:bg-blue-700 w-full text-left">
                <i class="fas fa-sign-out-alt mr-3"></i>
                <span>Logout</span>
            </button>
        </form>
    </div>
</div>
