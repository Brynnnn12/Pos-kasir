<div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100">
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-8">
            <h1
                class="text-4xl font-bold text-gray-900 bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">
                Point of Sale
            </h1>
            <div class="bg-white rounded-lg shadow-sm px-4 py-2">
                <div class="text-sm text-gray-600">
                    <i class="fas fa-user mr-2 text-blue-500"></i>
                    Kasir: <span class="font-semibold text-gray-900">{{ auth()->user()->name }}</span>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Product Selection -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100">
                    <h2 class="text-2xl font-semibold mb-6 text-gray-800 flex items-center">
                        <i class="fas fa-boxes mr-3 text-blue-500"></i>
                        Pilih Produk
                    </h2>
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        @foreach ($products as $product)
                            <div class="bg-white rounded-xl p-4 hover:bg-blue-50 cursor-pointer transition-all duration-300 transform hover:scale-105 hover:shadow-lg border border-gray-200 hover:border-blue-300 group"
                                wire:click="addToCart({{ $product->id }})">
                                <div class="text-center">
                                    @if ($product->image)
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                            class="w-20 h-20 object-cover rounded-lg mx-auto mb-3 shadow-sm group-hover:shadow-md transition-shadow">
                                    @else
                                        <div
                                            class="w-20 h-20 bg-gradient-to-br from-gray-100 to-gray-200 rounded-lg mx-auto mb-3 flex items-center justify-center shadow-sm group-hover:shadow-md transition-shadow">
                                            <i class="fas fa-image text-gray-400 text-2xl"></i>
                                        </div>
                                    @endif
                                    <h3
                                        class="font-semibold text-sm text-gray-800 mb-1 group-hover:text-blue-600 transition-colors">
                                        {{ $product->name }}</h3>
                                    <p class="text-blue-600 font-bold text-lg mb-1">Rp
                                        {{ number_format($product->price, 0, ',', '.') }}</p>
                                    <div class="flex items-center justify-center space-x-1">
                                        <i class="fas fa-box text-xs text-gray-400"></i>
                                        <p class="text-xs text-gray-500">Stock:
                                            <span
                                                class="{{ $product->stock <= 5 ? 'text-red-500 font-semibold' : 'text-green-500' }}">
                                                {{ $product->stock }}
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Cart & Checkout -->
            <div class="space-y-6">
                <!-- Cart -->
                <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100">
                    <h2 class="text-2xl font-semibold mb-6 text-gray-800 flex items-center">
                        <i class="fas fa-shopping-cart mr-3 text-green-500"></i>
                        Keranjang Belanja
                        @if (!empty($cart))
                            <span
                                class="ml-2 bg-green-500 text-white text-xs px-2 py-1 rounded-full">{{ count($cart) }}</span>
                        @endif
                    </h2>

                    @if (empty($cart))
                        <div class="text-center py-12 text-gray-500">
                            <i class="fas fa-shopping-cart text-6xl mb-4 text-gray-300"></i>
                            <p class="text-lg">Keranjang Anda kosong</p>
                            <p class="text-sm">Tambahkan beberapa produk untuk memulai</p>
                        </div>
                    @else
                        <div class="space-y-4 max-h-96 overflow-y-auto">
                            @foreach ($cart as $index => $item)
                                <div class="flex items-center justify-between border-b border-gray-100 pb-4">
                                    <div class="flex-1">
                                        <h4 class="font-semibold text-gray-800">{{ $item['name'] }}</h4>
                                        <p class="text-sm text-gray-600">Rp
                                            {{ number_format($item['price'], 0, ',', '.') }}</p>
                                    </div>
                                    <div class="flex items-center space-x-3">
                                        <button wire:click="updateQty({{ $index }}, {{ $item['qty'] - 1 }})"
                                            class="w-8 h-8 bg-red-100 text-red-600 rounded-lg flex items-center justify-center hover:bg-red-200 transition-colors">
                                            <i class="fas fa-minus text-xs"></i>
                                        </button>
                                        <input type="number" wire:model.live="cart.{{ $index }}.qty"
                                            wire:change="updateQty({{ $index }}, $event.target.value)"
                                            class="w-16 text-center border border-gray-300 rounded-lg px-2 py-1 focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                                            min="1" max="{{ $item['stock'] }}">
                                        <button wire:click="updateQty({{ $index }}, {{ $item['qty'] + 1 }})"
                                            class="w-8 h-8 bg-green-100 text-green-600 rounded-lg flex items-center justify-center hover:bg-green-200 transition-colors">
                                            <i class="fas fa-plus text-xs"></i>
                                        </button>
                                        <button wire:click="removeFromCart({{ $index }})"
                                            class="w-8 h-8 bg-red-500 text-white rounded-lg flex items-center justify-center hover:bg-red-600 transition-colors">
                                            <i class="fas fa-trash text-xs"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="text-right text-sm font-medium text-gray-700">
                                    Subtotal: Rp {{ number_format($item['subtotal'], 0, ',', '.') }}
                                </div>
                            @endforeach
                        </div>

                        <div class="border-t border-gray-200 pt-4 mt-4">
                            <div class="flex justify-between items-center text-xl font-bold text-gray-900">
                                <span>Total:</span>
                                <span class="text-blue-600">Rp
                                    {{ number_format($this->getTotal(), 0, ',', '.') }}</span>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Checkout -->
                @if (!empty($cart))
                    <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100">
                        <h2 class="text-2xl font-semibold mb-6 text-gray-800 flex items-center">
                            <i class="fas fa-credit-card mr-3 text-purple-500"></i>
                            Detail Pembayaran
                        </h2>
                        <form wire:submit="checkout" class="space-y-6">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Payment Type</label>
                                <select wire:model="payment_type"
                                    class="w-full border-gray-300 rounded-lg shadow-sm focus:border-purple-500 focus:ring-purple-500 bg-gray-50">
                                    <option value="">Pilih Tipe Pembayaran</option>
                                    <option value="cash">💵 Tunai</option>
                                    <option value="card">💳 Kartu</option>
                                    <option value="transfer">🏦 Transfer</option>
                                </select>
                                <x-form.input-error :messages="$errors->get('payment_type')" />
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Jumlah Pembayaran</label>
                                <input type="number" wire:model.live="payment_amount" step="0.01"
                                    class="w-full border-gray-300 rounded-lg shadow-sm focus:border-purple-500 focus:ring-purple-500 bg-gray-50"
                                    placeholder="Masukkan jumlah pembayaran">
                                <x-form.input-error :messages="$errors->get('payment_amount')" />
                            </div>

                            <div
                                class="bg-gradient-to-r from-blue-50 to-purple-50 p-4 rounded-lg border border-blue-200">
                                <div class="space-y-2">
                                    <div class="flex justify-between text-sm">
                                        <span class="font-medium text-gray-700">Total:</span>
                                        <span class="font-semibold text-gray-900">Rp
                                            {{ number_format($this->getTotal(), 0, ',', '.') }}</span>
                                    </div>
                                    <div class="flex justify-between text-sm">
                                        <span class="font-medium text-gray-700">Pembayaran:</span>
                                        <span class="font-semibold text-blue-600">Rp
                                            {{ number_format((float) $payment_amount, 0, ',', '.') }}</span>
                                    </div>
                                    <hr class="border-gray-300">
                                    <div class="flex justify-between text-lg font-bold">
                                        <span class="text-gray-800">Kembalian:</span>
                                        <span class="text-green-600">Rp
                                            {{ number_format((float) $change_amount, 0, ',', '.') }}</span>
                                    </div>
                                </div>
                            </div>

                            <button type="submit"
                                class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white py-4 px-6 rounded-lg hover:from-blue-700 hover:to-purple-700 transition-all duration-300 font-semibold shadow-lg hover:shadow-xl transform hover:scale-105">
                                <i class="fas fa-check-circle mr-2"></i>
                                Selesaikan Transaksi
                            </button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
