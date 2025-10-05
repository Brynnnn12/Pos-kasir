<div class="space-y-6">
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold text-gray-900">Sale Management</h1>
        <x-ui.primary-button wire:click="create">
            Add New Sale
        </x-ui.primary-button>
    </div>

    <!-- Modal for Create/Edit Sale -->
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
                                    {{ $editingId ? 'Edit Sale' : 'Create New Sale' }}
                                </h3>
                                <form wire:submit.prevent="{{ $editingId ? 'update' : 'store' }}" class="space-y-4">
                                    <x-form.input wire:model="total" name="total" label="Total" type="number"
                                        step="0.01" required />
                                    <x-form.input wire:model="payment_type" name="payment_type" label="Payment Type"
                                        required />
                                    <x-form.input wire:model="payment_amount" name="payment_amount"
                                        label="Payment Amount" type="number" step="0.01" required />
                                    <x-form.input wire:model="change_amount" name="change_amount" label="Change Amount"
                                        type="number" step="0.01" required />
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
        <!-- Search & Filters -->
        <div class="mb-6 space-y-4">
            <!-- Filter Grid Layout - Adjusted for Better Responsiveness -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <!-- Search -->
                <div class="sm:col-span-2 lg:col-span-2">
                    <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                    <input type="text" wire:model.live.debounce.300ms="search" id="search"
                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        placeholder="Search sales...">
                </div>

                <!-- Payment Type Filter -->
                <div>
                    <label for="paymentTypeFilter" class="block text-sm font-medium text-gray-700 mb-1">Payment
                        Type</label>
                    <select wire:model.live="paymentTypeFilter" id="paymentTypeFilter"
                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        <option value="">All Types</option>
                        <option value="cash">Cash</option>
                        <option value="card">Card</option>
                        <option value="transfer">Transfer</option>
                    </select>
                </div>

                <!-- Date From -->
                <div>
                    <label for="dateFrom" class="block text-sm font-medium text-gray-700 mb-1">Date From</label>
                    <input type="date" wire:model.live="dateFrom" id="dateFrom"
                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>

                <!-- Date To -->
                <div class="sm:col-span-2 lg:col-span-1">
                    <label for="dateTo" class="block text-sm font-medium text-gray-700 mb-1">Date To</label>
                    <input type="date" wire:model.live="dateTo" id="dateTo"
                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>
            </div>

            <!-- Per Page & Clear Filters Row -->
            <div class="flex flex-col sm:flex-row gap-4 justify-between items-start sm:items-center">
                <!-- Per Page -->
                <div class="w-full sm:w-48">
                    <label for="perPage" class="block text-sm font-medium text-gray-700 mb-1">Per Page</label>
                    <select wire:model.live="perPage" id="perPage"
                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>

                <!-- Clear Filters Button -->
                <div class="w-full sm:w-auto">
                    <x-ui.secondary-button wire:click="clearFilters" class="w-full sm:w-auto">
                        Clear Filters
                    </x-ui.secondary-button>
                </div>
            </div>
        </div>

        <x-ui.table :headers="['No', 'User', 'Total', 'Payment Type', 'Payment Amount', 'Change Amount', 'Created At', 'Actions']" :sortable-headers="['', '', 'total', '', 'payment_amount', 'change_amount', 'created_at', '']" :sort-by="$sortBy" :sort-direction="$sortDirection">
            @forelse ($sales as $sale)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        {{ $sales->firstItem() + $loop->index }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $sale->user->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rp
                        {{ number_format($sale->total, 0, ',', '.') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        <span
                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                {{ $sale->payment_type === 'cash'
                                    ? 'bg-green-100 text-green-800'
                                    : ($sale->payment_type === 'card'
                                        ? 'bg-blue-100 text-blue-800'
                                        : 'bg-purple-100 text-purple-800') }}">
                            {{ ucfirst($sale->payment_type) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rp
                        {{ number_format($sale->payment_amount, 0, ',', '.') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rp
                        {{ number_format($sale->change_amount, 0, ',', '.') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $sale->created_at->format('d/m/Y H:i') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <x-ui.button wire:click="edit({{ $sale->id }})" class="mr-2">
                            Edit
                        </x-ui.button>
                        <x-ui.danger-button wire:click="delete({{ $sale->id }})"
                            wire:confirm="Are you sure you want to delete this sale?">
                            Delete
                        </x-ui.danger-button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="px-6 py-4 text-center text-gray-500">
                        No sales found.
                    </td>
                </tr>
            @endforelse
        </x-ui.table>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $sales->links() }}
        </div>
    </x-ui.card>
</div>
