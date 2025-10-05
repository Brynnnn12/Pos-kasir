<?php

namespace App\Livewire\SaleItem;

use App\Models\SaleItem;
use App\Services\SaleItemService;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Gate;

class Index extends Component
{
    use WithPagination;

    protected $layout = 'components.layout.dashboard';

    public $sale_id;
    public $product_id;
    public $qty;
    public $price;
    public $subtotal;
    public $editingId = null;
    public $showModal = false;

    // Search & Pagination
    public $search = '';
    public $perPage = 10;
    public $sortBy = 'created_at';
    public $sortDirection = 'desc';
    public $saleFilter = '';
    public $productFilter = '';

    protected SaleItemService $saleItemService;

    public function boot(SaleItemService $saleItemService): void
    {
        $this->saleItemService = $saleItemService;
    }

    public function create(): void
    {
        Gate::authorize('create', SaleItem::class);

        $this->resetForm();
        $this->showModal = true;
    }

    public function store(): void
    {
        Gate::authorize('create', SaleItem::class);

        $validated = $this->validate([
            'sale_id' => 'required|exists:sales,id',
            'product_id' => 'required|exists:products,id',
            'qty' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'subtotal' => 'required|numeric|min:0',
        ], [
            'sale_id.required' => 'Sale is required.',
            'sale_id.exists' => 'Selected sale does not exist.',
            'product_id.required' => 'Product is required.',
            'product_id.exists' => 'Selected product does not exist.',
            'qty.required' => 'Quantity is required.',
            'qty.integer' => 'Quantity must be a whole number.',
            'qty.min' => 'Quantity must be at least 1.',
            'price.required' => 'Price is required.',
            'price.numeric' => 'Price must be a number.',
            'price.min' => 'Price cannot be negative.',
            'subtotal.required' => 'Subtotal is required.',
            'subtotal.numeric' => 'Subtotal must be a number.',
            'subtotal.min' => 'Subtotal cannot be negative.',
        ]);

        $this->saleItemService->create($validated);

        $this->resetForm();
        $this->js('Swal.fire({icon: "success", title: "Success!", text: "Sale item created successfully.", toast: true, position: "top-end", showConfirmButton: false, timer: 3000})');
    }

    public function edit(int $id): void
    {
        $saleItem = $this->saleItemService->findById($id);
        Gate::authorize('update', $saleItem);

        $this->editingId = $id;
        $this->sale_id = $saleItem->sale_id;
        $this->product_id = $saleItem->product_id;
        $this->qty = $saleItem->qty;
        $this->price = $saleItem->price;
        $this->subtotal = $saleItem->subtotal;
        $this->showModal = true;
    }

    public function update(): void
    {
        $saleItem = $this->saleItemService->findById($this->editingId);
        Gate::authorize('update', $saleItem);

        $validated = $this->validate([
            'sale_id' => 'required|exists:sales,id',
            'product_id' => 'required|exists:products,id',
            'qty' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'subtotal' => 'required|numeric|min:0',
        ], [
            'sale_id.required' => 'Sale is required.',
            'sale_id.exists' => 'Selected sale does not exist.',
            'product_id.required' => 'Product is required.',
            'product_id.exists' => 'Selected product does not exist.',
            'qty.required' => 'Quantity is required.',
            'qty.integer' => 'Quantity must be a whole number.',
            'qty.min' => 'Quantity must be at least 1.',
            'price.required' => 'Price is required.',
            'price.numeric' => 'Price must be a number.',
            'price.min' => 'Price cannot be negative.',
            'subtotal.required' => 'Subtotal is required.',
            'subtotal.numeric' => 'Subtotal must be a number.',
            'subtotal.min' => 'Subtotal cannot be negative.',
        ]);

        $this->saleItemService->update($saleItem, $validated);

        $this->resetForm();
        $this->js('Swal.fire({icon: "success", title: "Success!", text: "Sale item updated successfully.", toast: true, position: "top-end", showConfirmButton: false, timer: 3000})');
    }

    public function delete(int $id): void
    {
        $saleItem = $this->saleItemService->findById($id);
        Gate::authorize('delete', $saleItem);

        $this->saleItemService->delete($saleItem);

        $this->js('Swal.fire({icon: "success", title: "Success!", text: "Sale item deleted successfully.", toast: true, position: "top-end", showConfirmButton: false, timer: 3000})');
    }

    private function resetForm(): void
    {
        $this->sale_id = '';
        $this->product_id = '';
        $this->qty = '';
        $this->price = '';
        $this->subtotal = '';
        $this->editingId = null;
        $this->showModal = false;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function updatingSaleFilter()
    {
        $this->resetPage();
    }

    public function updatingProductFilter()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortBy === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function clearFilters()
    {
        $this->search = '';
        $this->saleFilter = '';
        $this->productFilter = '';
        $this->resetPage();
    }

    public function render()
    {
        $query = SaleItem::with(['sale', 'product']);

        // Search functionality
        if ($this->search) {
            $query->where(function ($q) {
                $q->where('qty', 'like', '%' . $this->search . '%')
                    ->orWhere('price', 'like', '%' . $this->search . '%')
                    ->orWhere('subtotal', 'like', '%' . $this->search . '%');
            });
        }

        // Sale filter
        if ($this->saleFilter) {
            $query->where('sale_id', $this->saleFilter);
        }

        // Product filter
        if ($this->productFilter) {
            $query->where('product_id', $this->productFilter);
        }

        // Sorting
        $query->orderBy($this->sortBy, $this->sortDirection);

        return view('livewire.sale-item.index', [
            'saleItems' => $query->paginate($this->perPage),
            'sales' => \App\Models\Sale::select('id', 'created_at')->get(),
            'products' => \App\Models\Product::select('id', 'name')->get()
        ]);
    }
}
