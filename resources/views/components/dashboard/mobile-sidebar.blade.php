            <div x-show="isSidebarOpen" @click.away="isSidebarOpen = false" class="fixed inset-0 z-50 md:hidden" x-cloak>
                <div class="fixed inset-0 bg-gray-800 bg-opacity-75" @click="isSidebarOpen = false"></div>
                <div class="fixed inset-y-0 left-0 w-64 bg-blue-800 text-white p-4">
                    <div class="text-2xl font-bold mb-8 mt-4 flex items-center justify-between">
                        <div class="flex items-center">
                            <i class="fas fa-chart-line mr-2"></i>
                            <span>DashBoard</span>
                        </div>
                        <button @click="isSidebarOpen = false">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>

                    <nav>
                        <a href="{{ route('dashboard') }}" wire:navigate
                            class="flex items-center p-3 rounded-lg mb-2 transition-all hover:bg-blue-700 cursor-pointer {{ request()->routeIs('dashboard') ? 'bg-blue-700' : '' }}"
                            @click="isSidebarOpen = false">
                            <i class="fas fa-home mr-3"></i>
                            <span>Overview</span>
                        </a>

                        <a href="{{ route('categories.index') }}" wire:navigate
                            class="flex items-center p-3 rounded-lg mb-2 transition-all hover:bg-blue-700 cursor-pointer {{ request()->routeIs('categories.*') ? 'bg-blue-700' : '' }}"
                            @click="isSidebarOpen = false">
                            <i class="fas fa-th mr-3"></i>
                            <span>Categories</span>
                        </a>
                        <a href="{{ route('products.index') }}" wire:navigate
                            class="flex items-center p-3 rounded-lg mb-2 transition-all hover:bg-blue-700 cursor-pointer {{ request()->routeIs('products.*') ? 'bg-blue-700' : '' }}"
                            @click="isSidebarOpen = false">
                            <i class="fas fa-box mr-3"></i>
                            <span>Products</span>
                        </a>
                        <a href="{{ route('sales.index') }}" wire:navigate
                            class="flex items-center p-3 rounded-lg mb-2 transition-all hover:bg-blue-700 cursor-pointer {{ request()->routeIs('sales.*') ? 'bg-blue-700' : '' }}"
                            @click="isSidebarOpen = false">
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
                            class="flex items-center p-3 rounded-lg mb-2 transition-all hover:bg-blue-700 cursor-pointer {{ request()->routeIs('transactions.*') ? 'bg-blue-700' : '' }}"
                            @click="isSidebarOpen = false">
                            <i class="fas fa-receipt mr-3"></i>
                            <span>Transactions</span>
                        </a>
                        <a href="{{ route('profile.edit') }}" wire:navigate
                            class="flex items-center p-3 rounded-lg mb-2 transition-all hover:bg-blue-700 cursor-pointer {{ request()->routeIs('profile.*') ? 'bg-blue-700' : '' }}"
                            @click="isSidebarOpen = false">
                            <i class="fas fa-user mr-3"></i>
                            <span>Profile</span>
                        </a>
                    </nav>
                </div>
            </div>
