<div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100">
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-8">
            <h1
                class="text-4xl font-bold text-gray-900 bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">
                Daftar Transaksi
            </h1>
            <div class="bg-white rounded-lg shadow-sm px-4 py-2">
                <div class="text-sm text-gray-600">
                    <i class="fas fa-user mr-2 text-blue-500"></i>
                    Kasir: <span class="font-semibold text-gray-900">{{ auth()->user()->name }}</span>
                </div>
            </div>
        </div>

        <!-- Filters and Search -->
        <div class="bg-white rounded-xl shadow-lg p-6 mb-6 border border-gray-100">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
                <!-- Search -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Cari Transaksi</label>
                    <input type="text" wire:model.live.debounce.300ms="search"
                        placeholder="Cari berdasarkan kasir, pembayaran, atau ID..."
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Date From -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Dari Tanggal</label>
                    <input type="date" wire:model.live="dateFrom"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Date To -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Sampai Tanggal</label>
                    <input type="date" wire:model.live="dateTo"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Per Page -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tampilkan</label>
                    <select wire:model.live="perPage"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="5">5 per halaman</option>
                        <option value="10">10 per halaman</option>
                        <option value="25">25 per halaman</option>
                        <option value="50">50 per halaman</option>
                    </select>
                </div>
            </div>

            <!-- Clear Filters Button -->
            <div class="flex justify-end">
                <button wire:click="clearFilters"
                    class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition-colors duration-200">
                    <i class="fas fa-times mr-2"></i>
                    Hapus Filter
                </button>
            </div>
        </div>

        <!-- Transactions Table -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <button wire:click="sortBy('id')" class="flex items-center hover:text-gray-700">
                                    ID Transaksi
                                    @if ($sortBy === 'id')
                                        <i class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }} ml-1"></i>
                                    @endif
                                </button>
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <button wire:click="sortBy('users.name')" class="flex items-center hover:text-gray-700">
                                    Kasir
                                    @if ($sortBy === 'users.name')
                                        <i class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }} ml-1"></i>
                                    @endif
                                </button>
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <button wire:click="sortBy('total')" class="flex items-center hover:text-gray-700">
                                    Total
                                    @if ($sortBy === 'total')
                                        <i class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }} ml-1"></i>
                                    @endif
                                </button>
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Pembayaran
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <button wire:click="sortBy('created_at')" class="flex items-center hover:text-gray-700">
                                    Tanggal
                                    @if ($sortBy === 'created_at')
                                        <i class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }} ml-1"></i>
                                    @endif
                                </button>
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Produk
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($transactions as $transaction)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    #{{ $transaction->id }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <div
                                                class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-semibold">
                                                {{ substr($transaction->user->name, 0, 1) }}
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $transaction->user->name }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-green-600">
                                    Rp {{ number_format($transaction->total, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="inline-flex px-2 py-1 text-xs font-semibold rounded-full
                                    {{ $transaction->payment_type === 'cash'
                                        ? 'bg-green-100 text-green-800'
                                        : ($transaction->payment_type === 'card'
                                            ? 'bg-blue-100 text-blue-800'
                                            : 'bg-purple-100 text-purple-800') }}">
                                        {{ ucfirst($transaction->payment_type) }}
                                    </span>
                                    @if ($transaction->payment_amount > $transaction->total)
                                        <div class="text-xs text-gray-500 mt-1">
                                            Kembalian: Rp
                                            {{ number_format($transaction->payment_amount - $transaction->total, 0, ',', '.') }}
                                        </div>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $transaction->created_at->format('d/m/Y H:i') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <div class="flex items-center space-x-2">
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                            {{ $transaction->saleItems->count() }}
                                            item{{ $transaction->saleItems->count() > 1 ? 's' : '' }}
                                        </span>
                                        <button class="text-blue-600 hover:text-blue-800 text-sm font-medium"
                                            onclick="toggleDetails({{ $transaction->id }})">
                                            <i class="fas fa-eye mr-1"></i>
                                            Lihat
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Expandable Product Details Row -->
                            <tr id="details-{{ $transaction->id }}" class="hidden bg-blue-50">
                                <td colspan="6" class="px-6 py-4">
                                    <div class="bg-white rounded-lg p-4 border border-blue-200">
                                        <h4 class="font-semibold text-gray-800 mb-3 flex items-center">
                                            <i class="fas fa-list-ul mr-2 text-blue-500"></i>
                                            Detail Produk Transaksi #{{ $transaction->id }}
                                        </h4>
                                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                            @foreach ($transaction->saleItems as $item)
                                                <div class="bg-gray-50 rounded-lg p-3 border border-gray-200">
                                                    <div class="flex items-start space-x-3">
                                                        @if ($item->product->image)
                                                            <img src="{{ asset('storage/' . $item->product->image) }}"
                                                                alt="{{ $item->product->name }}"
                                                                class="w-12 h-12 object-cover rounded-lg">
                                                        @else
                                                            <div
                                                                class="w-12 h-12 bg-gray-200 rounded-lg flex items-center justify-center">
                                                                <i class="fas fa-image text-gray-400"></i>
                                                            </div>
                                                        @endif
                                                        <div class="flex-1 min-w-0">
                                                            <p class="text-sm font-medium text-gray-900 truncate">
                                                                {{ $item->product->name }}
                                                            </p>
                                                            <p class="text-sm text-gray-500">
                                                                {{ $item->qty }} x Rp
                                                                {{ number_format($item->price, 0, ',', '.') }}
                                                            </p>
                                                            <p class="text-sm font-semibold text-green-600">
                                                                Subtotal: Rp
                                                                {{ number_format($item->subtotal, 0, ',', '.') }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center">
                                        <i class="fas fa-receipt text-gray-400 text-4xl mb-4"></i>
                                        <h3 class="text-lg font-medium text-gray-900 mb-2">Tidak ada transaksi ditemukan
                                        </h3>
                                        <p class="text-gray-500">Coba ubah filter pencarian atau tanggal untuk melihat
                                            transaksi lainnya.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if ($transactions->hasPages())
                <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                    <div class="flex items-center justify-between">
                        <div class="text-sm text-gray-700">
                            Menampilkan {{ $transactions->firstItem() }} sampai {{ $transactions->lastItem() }}
                            dari {{ $transactions->total() }} hasil
                        </div>
                        <div class="flex space-x-1">
                            @if ($transactions->onFirstPage())
                                <span
                                    class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-400 bg-gray-100 border border-gray-300 cursor-not-allowed rounded-l-md">
                                    <i class="fas fa-chevron-left"></i>
                                </span>
                            @else
                                <a href="{{ $transactions->previousPageUrl() }}"
                                    class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-l-md hover:bg-gray-50">
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                            @endif

                            @foreach ($transactions->getUrlRange(1, $transactions->lastPage()) as $page => $url)
                                <a href="{{ $url }}"
                                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium {{ $transactions->currentPage() == $page ? 'text-blue-600 bg-blue-50 border-blue-500' : 'text-gray-500 bg-white border-gray-300 hover:bg-gray-50' }} border">
                                    {{ $page }}
                                </a>
                            @endforeach

                            @if ($transactions->hasMorePages())
                                <a href="{{ $transactions->nextPageUrl() }}"
                                    class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-r-md hover:bg-gray-50">
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            @else
                                <span
                                    class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-400 bg-gray-100 border border-gray-300 cursor-not-allowed rounded-r-md">
                                    <i class="fas fa-chevron-right"></i>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

<script>
    function toggleDetails(transactionId) {
        const detailsRow = document.getElementById(`details-${transactionId}`);
        const isHidden = detailsRow.classList.contains('hidden');

        // Hide all other details rows first
        document.querySelectorAll('[id^="details-"]').forEach(row => {
            if (row !== detailsRow) {
                row.classList.add('hidden');
            }
        });

        // Toggle current row
        if (isHidden) {
            detailsRow.classList.remove('hidden');
        } else {
            detailsRow.classList.add('hidden');
        }
    }
</script>
