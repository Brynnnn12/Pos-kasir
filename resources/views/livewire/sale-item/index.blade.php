<div class="space-y-6">
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold text-gray-900">Manajemen Item Penjualan</h1>
        <x-ui.primary-button wire:click="create">
            Tambah Item Penjualan
        </x-ui.primary-button>
    </div>

    <!-- Modal for Create/Edit Sale Item -->
    @if ($showModal)
        <div class="fixed inset-0 z-50 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity">
                    <div class="absolute inset-0 bg-gray-500 opacity-75" wire:click="$set('showModal', false)"></div>
                </div>
                <div
                    class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mt-3 text-center sm:mt-0 sm:text-left w-full">
                                <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">
                                    {{ $editingId ? 'Edit Sale Item' : 'Create New Sale Item' }}
                                </h3>
                                <form wire:submit.prevent="{{ $editingId ? 'update' : 'store' }}" class="space-y-4">
                                    <div>
                                        <x-form.input-label value="Sale" />
                                        <select wire:model="sale_id" name="sale_id" id="sale_id"
                                            class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm transition-colors mt-1">
                                            <option value="">Select Sale</option>
                                            @foreach (\App\Models\Sale::all() as $sale)
                                                <option value="{{ $sale->id }}">Sale #{{ $sale->id }} -
                                                    {{ $sale->user->name }}</option>
                                            @endforeach
                                        </select>
                                        <x-form.input-error :messages="$errors->get('sale_id')" class="mt-1" />
                                    </div>
                                    <div>
                                        <x-form.input-label value="Product" />
                                        <select wire:model="product_id" name="product_id" id="product_id"
                                            class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm transition-colors mt-1">
                                            <option value="">Select Product</option>
                                            @foreach (\App\Models\Product::all() as $product)
                                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                                            @endforeach
                                        </select>
                                        <x-form.input-error :messages="$errors->get('product_id')" class="mt-1" />
                                    </div>
                                    <x-form.input wire:model="qty" name="qty" label="Quantity" type="number"
                                        required />
                                    <x-form.input wire:model="price" name="price" label="Price" type="number"
                                        step="0.01" required />
                                    <x-form.input wire:model="subtotal" name="subtotal" label="Subtotal" type="number"
                                        step="0.01" required />
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <x-ui.primary-button wire:click="{{ $editingId ? 'update' : 'store' }}" class="ml-3">
                            {{ $editingId ? 'Update' : 'Create' }}
                        </x-ui.primary-button>
                        <x-ui.secondary-button wire:click="$set('showModal', false)">
                            Cancel
                        </x-ui.secondary-button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <x-ui.card>
        <x-ui.table :headers="['No', 'Sale', 'Product', 'Qty', 'Price', 'Subtotal', 'Created At', 'Actions']">
            @forelse ($saleItems as $saleItem)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $loop->iteration }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Sale #{{ $saleItem->sale->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $saleItem->product->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $saleItem->qty }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rp
                        {{ number_format($saleItem->price, 0, ',', '.') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rp
                        {{ number_format($saleItem->subtotal, 0, ',', '.') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        {{ $saleItem->created_at->format('d/m/Y H:i') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <x-ui.button wire:click="edit({{ $saleItem->id }})" class="mr-2">
                            Edit
                        </x-ui.button>
                        <x-ui.danger-button wire:click="delete({{ $saleItem->id }})"
                            wire:confirm="Are you sure you want to delete this sale item?">
                            Delete
                        </x-ui.danger-button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="px-6 py-4 text-center text-gray-500">
                        No sale items found.
                    </td>
                </tr>
            @endforelse
        </x-ui.table>
    </x-ui.card>
</div>
