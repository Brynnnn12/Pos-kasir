<?php

namespace App\Livewire\Dashboard;

use App\Models\Sale;
use App\Models\SaleItem;
use Livewire\Component;

class Index extends Component
{
    public $todayRevenue;
    public $monthRevenue;
    public $todayOrders;
    public $monthOrders;
    public $todayCustomers;
    public $todayProductsSold;
    public $monthlyRevenueData;
    public $categoryData;
    public $recentSales;

    public function mount()
    {
        $this->loadDashboardData();
    }

    public function loadDashboardData()
    {
        $today = now()->toDateString();

        // Statistik hari ini
        $this->todayRevenue = Sale::whereDate('created_at', $today)->sum('total');
        $this->todayOrders = Sale::whereDate('created_at', $today)->count();
        $this->todayCustomers = Sale::whereDate('created_at', $today)->distinct('user_id')->count('user_id');
        $this->todayProductsSold = SaleItem::whereDate('created_at', $today)->sum('qty');

        // Statistik bulan ini
        $this->monthRevenue = Sale::whereYear('created_at', now()->year)
            ->whereMonth('created_at', now()->month)
            ->sum('total');
        $this->monthOrders = Sale::whereYear('created_at', now()->year)
            ->whereMonth('created_at', now()->month)
            ->count();

        // Data untuk chart pendapatan bulanan (12 bulan terakhir)
        $this->monthlyRevenueData = [];
        for ($i = 11; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $revenue = Sale::whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->sum('total');
            $this->monthlyRevenueData[] = $revenue;
        }

        // Data untuk chart kategori
        $this->categoryData = SaleItem::join('products', 'sale_items.product_id', '=', 'products.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->selectRaw('categories.name, SUM(sale_items.subtotal) as total')
            ->groupBy('categories.id', 'categories.name')
            ->orderBy('total', 'desc')
            ->take(5)
            ->get();

        // Recent sales
        $this->recentSales = Sale::with(['user'])
            ->latest()
            ->take(5)
            ->get();
    }

    public function render()
    {
        return view('livewire.dashboard.index');
    }
}
