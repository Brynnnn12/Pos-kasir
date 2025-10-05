<div class="space-y-6">
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold text-gray-900">Category Management</h1>
        <x-ui.primary-button wire:click="create">
            Add New Category
        </x-ui.primary-button>
    </div>

    <!-- Modal for Create/Edit Category -->
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
                                    {{ $editingId ? 'Edit Category' : 'Create New Category' }}
                                </h3>
                                <form wire:submit.prevent="{{ $editingId ? 'update' : 'store' }}" class="space-y-4">
                                    <x-form.input wire:model="name" name="name" label="Name" required />
                                    <div>
                                        <x-form.input-label value="Description" />
                                        <textarea wire:model="description" name="description" id="description" rows="3"
                                            class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm transition-colors mt-1"></textarea>
                                        <x-form.input-error :messages="$errors->get('description')" class="mt-1" />
                                    </div>
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
            <div class="flex flex-col sm:flex-row gap-4">
                <!-- Search -->
                <div class="flex-1">
                    <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                    <input type="text" wire:model.live.debounce.300ms="search" id="search"
                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        placeholder="Search categories...">
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

        <x-ui.table :headers="['No', 'Name', 'Description', 'Created', 'Actions']" :sortable-headers="['', 'name', 'description', 'created_at', '']" :sort-by="$sortBy" :sort-direction="$sortDirection">
            @forelse ($categories as $category)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        {{ $categories->firstItem() + $loop->index }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $category->name }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ $category->description }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $category->created_at->format('d/m/Y H:i') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <x-ui.button wire:click="edit({{ $category->id }})" class="mr-2">
                            Edit
                        </x-ui.button>
                        <x-ui.danger-button wire:click="delete({{ $category->id }})"
                            wire:confirm="Are you sure you want to delete this category?">
                            Delete
                        </x-ui.danger-button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                        No categories found.
                    </td>
                </tr>
            @endforelse
            </tbody>
            </table>
        </x-ui.table>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $categories->links() }}
        </div>
    </x-ui.card>
</div>
