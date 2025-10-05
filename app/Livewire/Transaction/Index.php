<?php

namespace App\Livewire\Transaction;

use App\Models\Sale;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;
    public $sortBy = 'created_at';
    public $sortDirection = 'desc';
    public $dateFrom = '';
    public $dateTo = '';

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => 10],
        'sortBy' => ['except' => 'created_at'],
        'sortDirection' => ['except' => 'desc'],
        'dateFrom' => ['except' => ''],
        'dateTo' => ['except' => ''],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
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

    public function sortBy($column)
    {
        // Handle special cases for relationships
        if ($column === 'user.name') {
            $column = 'users.name';
        }

        if ($this->sortBy === $column) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $column;
            $this->sortDirection = 'asc';
        }
        $this->resetPage();
    }

    public function clearFilters()
    {
        $this->search = '';
        $this->dateFrom = '';
        $this->dateTo = '';
        $this->resetPage();
    }

    public function getTransactionsProperty()
    {
        return Sale::with(['user', 'saleItems.product'])
            ->join('users', 'sales.user_id', '=', 'users.id')
            ->select('sales.*')
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('users.name', 'like', '%' . $this->search . '%')
                        ->orWhere('sales.payment_type', 'like', '%' . $this->search . '%')
                        ->orWhere('sales.id', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->dateFrom, function ($query) {
                $query->whereDate('sales.created_at', '>=', $this->dateFrom);
            })
            ->when($this->dateTo, function ($query) {
                $query->whereDate('sales.created_at', '<=', $this->dateTo);
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);
    }

    public function render()
    {
        return view('livewire.transaction.index', [
            'transactions' => $this->transactions,
        ]);
    }
}
