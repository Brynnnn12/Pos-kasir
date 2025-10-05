<div class="space-y-6">
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold text-gray-900">Product Management</h1>
        <x-ui.primary-button wire:click="create">
            Add New Product
        </x-ui.primary-button>
    </div>

    <!-- Modal for Create/Edit Product -->
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
                                    {{ $editingId ? 'Edit Product' : 'Create New Product' }}
                                </h3>
                                <form id="product-form" wire:submit.prevent="{{ $editingId ? 'update' : 'store' }}"
                                    class="space-y-4">
                                    <div>
                                        <x-form.input-label value="Category" />
                                        <select wire:model="category_id" name="category_id" id="category_id"
                                            class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm transition-colors mt-1">
                                            <option value="">Select Category</option>
                                            @foreach (\App\Models\Category::all() as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        <x-form.input-error :messages="$errors->get('category_id')" class="mt-1" />
                                    </div>
                                    <x-form.input wire:model="name" name="name" label="Name" required />
                                    <x-form.input wire:model="price" name="price" label="Price" type="number"
                                        step="0.01" required />
                                    <x-form.input wire:model="stock" name="stock" label="Stock" type="number"
                                        required />
                                    <div>
                                        <x-form.input-label value="Image" />
                                        <input wire:model="image" type="file" name="image" id="image"
                                            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 mt-1">
                                        <x-form.input-error :messages="$errors->get('image')" class="mt-1" />
                                        @if ($editingId && ($product = \App\Models\Product::find($editingId)) && $product->image)
                                            <div class="mt-2">
                                                <img src="{{ asset('storage/' . $product->image) }}" alt="Current Image"
                                                    class="w-20 h-20 object-cover rounded">
                                                <p class="text-sm text-gray-500 mt-1">Current image</p>
                                            </div>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="submit" form="product-form"
                            class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                            {{ $editingId ? 'Update' : 'Create' }}
                        </button>
                        <x-ui.secondary-button wire:click="$set('showModal', false)">
                            Cancel
                        </x-ui.secondary-button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <x-ui.card>
        <!-- Search & Filters -->
        <div class="mb-6 space-y-4">
            <div class="flex flex-col sm:flex-row gap-4">
                <!-- Search -->
                <div class="flex-1">
                    <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                    <input type="text" wire:model.live.debounce.300ms="search" id="search"
                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        placeholder="Search products...">
                </div>

                <!-- Category Filter -->
                <div class="sm:w-48">
                    <label for="categoryFilter" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                    <select wire:model.live="categoryFilter" id="categoryFilter"
                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        <option value="">All Categories</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Per Page -->
                <div class="sm:w-48">
                    <label for="perPage" class="block text-sm font-medium text-gray-700 mb-1">Per Page</label>
                    <select wire:model.live="perPage" id="perPage"
                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        <option value="5">5 per page</option>
                        <option value="10">10 per page</option>
                        <option value="25">25 per page</option>
                        <option value="50">50 per page</option>
                        <option value="100">100 per page</option>
                    </select>
                </div>
            </div>
        </div>

        <x-ui.table :headers="['No', 'Image', 'Name', 'Category', 'Price', 'Stock', 'Created', 'Actions']" :sortable-headers="['', '', 'name', '', 'price', 'stock', 'created_at', '']" :sort-by="$sortBy" :sort-direction="$sortDirection">
            @forelse ($products as $product)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        {{ $products->firstItem() + $loop->index }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                class="w-12 h-12 object-cover rounded">
                        @else
                            <div class="w-12 h-12 bg-gray-200 rounded flex items-center justify-center">
                                <i class="fas fa-image text-gray-400"></i>
                            </div>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $product->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        {{ $product->category->name }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rp
                        {{ number_format($product->price, 0, ',', '.') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        <span class="{{ $product->stock <= 5 ? 'text-red-600 font-semibold' : 'text-green-600' }}">
                            {{ $product->stock }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $product->created_at->format('d/m/Y H:i') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <x-ui.button wire:click="edit({{ $product->id }})" class="mr-2">
                            Edit
                        </x-ui.button>
                        <x-ui.danger-button wire:click="delete({{ $product->id }})"
                            wire:confirm="Are you sure you want to delete this product?">
                            Delete
                        </x-ui.danger-button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="px-6 py-4 text-center text-gray-500">
                        No products found.
                    </td>
                </tr>
            @endforelse
        </x-ui.table>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $products->links() }}
        </div>
    </x-ui.card>
</div>
