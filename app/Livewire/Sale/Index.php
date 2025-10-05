<?php

namespace App\Livewire\Sale;

use App\Models\Sale;
use App\Services\SaleService;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    use WithPagination;

    protected $layout = 'components.layout.dashboard';

    public $total;
    public $payment_type;
    public $payment_amount;
    public $change_amount;
    public $editingId = null;
    public $showModal = false;

    // Search & Pagination
    public $search = '';
    public $perPage = 10;
    public $sortBy = 'created_at';
    public $sortDirection = 'desc';
    public $paymentTypeFilter = '';
    public $dateFrom = '';
    public $dateTo = '';

    protected SaleService $saleService;

    public function boot(SaleService $saleService): void
    {
        $this->saleService = $saleService;
    }

    public function create(): void
    {
        Gate::authorize('create', Sale::class);

        $this->resetForm();
        $this->showModal = true;
    }

    public function store(): void
    {
        Gate::authorize('create', Sale::class);

        $validated = $this->validate([
            'total' => 'required|numeric|min:0',
            'payment_type' => 'required|string|max:255',
            'payment_amount' => 'required|numeric|min:0',
            'change_amount' => 'required|numeric|min:0',
        ], [
            'total.required' => 'Total is required.',
            'total.numeric' => 'Total must be a number.',
            'total.min' => 'Total cannot be negative.',
            'payment_type.required' => 'Payment type is required.',
            'payment_type.max' => 'Payment type cannot exceed 255 characters.',
            'payment_amount.required' => 'Payment amount is required.',
            'payment_amount.numeric' => 'Payment amount must be a number.',
            'payment_amount.min' => 'Payment amount cannot be negative.',
            'change_amount.required' => 'Change amount is required.',
            'change_amount.numeric' => 'Change amount must be a number.',
            'change_amount.min' => 'Change amount cannot be negative.',
        ]);

        $validated['user_id'] = Auth::id();

        $this->saleService->create($validated);

        $this->resetForm();
        $this->js('Swal.fire({icon: "success", title: "Success!", text: "Sale created successfully.", toast: true, position: "top-end", showConfirmButton: false, timer: 3000})');
    }

    public function edit(int $id): void
    {
        $sale = $this->saleService->findById($id);
        Gate::authorize('update', $sale);

        $this->editingId = $id;
        $this->total = $sale->total;
        $this->payment_type = $sale->payment_type;
        $this->payment_amount = $sale->payment_amount;
        $this->change_amount = $sale->change_amount;
        $this->showModal = true;
    }

    public function update(): void
    {
        $sale = $this->saleService->findById($this->editingId);
        Gate::authorize('update', $sale);

        $validated = $this->validate([
            'total' => 'required|numeric|min:0',
            'payment_type' => 'required|string|max:255',
            'payment_amount' => 'required|numeric|min:0',
            'change_amount' => 'required|numeric|min:0',
        ], [
            'total.required' => 'Total is required.',
            'total.numeric' => 'Total must be a number.',
            'total.min' => 'Total cannot be negative.',
            'payment_type.required' => 'Payment type is required.',
            'payment_type.max' => 'Payment type cannot exceed 255 characters.',
            'payment_amount.required' => 'Payment amount is required.',
            'payment_amount.numeric' => 'Payment amount must be a number.',
            'payment_amount.min' => 'Payment amount cannot be negative.',
            'change_amount.required' => 'Change amount is required.',
            'change_amount.numeric' => 'Change amount must be a number.',
            'change_amount.min' => 'Change amount cannot be negative.',
        ]);

        $validated['user_id'] = Auth::id();

        $this->saleService->update($sale, $validated);

        $this->resetForm();
        $this->js('Swal.fire({icon: "success", title: "Success!", text: "Sale updated successfully.", toast: true, position: "top-end", showConfirmButton: false, timer: 3000})');
    }

    public function delete(int $id): void
    {
        $sale = $this->saleService->findById($id);
        Gate::authorize('delete', $sale);

        $this->saleService->delete($sale);

        $this->js('Swal.fire({icon: "success", title: "Success!", text: "Sale deleted successfully.", toast: true, position: "top-end", showConfirmButton: false, timer: 3000})');
    }

    private function resetForm(): void
    {
        $this->total = '';
        $this->payment_type = '';
        $this->payment_amount = '';
        $this->change_amount = '';
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

    public function updatingPaymentTypeFilter()
    {
        $this->resetPage();
    }

    public function updatingDateFrom()
    {
        $this->resetPage();
    }

    public function updatingDateTo()
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
        $this->paymentTypeFilter = '';
        $this->dateFrom = '';
        $this->dateTo = '';
        $this->resetPage();
    }

    public function render()
    {
        $query = Sale::with('user')->where('user_id', Auth::id());

        // Search functionality
        if ($this->search) {
            $query->where(function ($q) {
                $q->where('total', 'like', '%' . $this->search . '%')
                    ->orWhere('payment_type', 'like', '%' . $this->search . '%')
                    ->orWhere('payment_amount', 'like', '%' . $this->search . '%');
            });
        }

        // Payment type filter
        if ($this->paymentTypeFilter) {
            $query->where('payment_type', $this->paymentTypeFilter);
        }

        // Date range filter
        if ($this->dateFrom) {
            $query->whereDate('created_at', '>=', $this->dateFrom);
        }
        if ($this->dateTo) {
            $query->whereDate('created_at', '<=', $this->dateTo);
        }

        // Sorting
        $query->orderBy($this->sortBy, $this->sortDirection);

        return view('livewire.sale.index', [
            'sales' => $query->paginate($this->perPage)
        ]);
    }
}
