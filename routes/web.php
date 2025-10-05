<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Landing page untuk guest, redirect ke POS untuk authenticated users
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('home');
    }
    return view('landing');
})->name('landing');

// Authenticated routes
Route::middleware(['auth'])->group(function () {
    Route::get('/pos', App\Livewire\Pos\Index::class)->name('home');
    Route::get('/transactions', App\Livewire\Transaction\Index::class)->name('transactions.index');
});

// Dashboard routes
Route::prefix('dashboard')->middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/overview', [DashboardController::class, 'index'])->name('overview');
    Route::get('/settings', [DashboardController::class, 'settings'])->name('settings.index');
    Route::put('/settings', [DashboardController::class, 'updateSettings'])->name('settings.update');

    Route::get('/categories', \App\Livewire\Category\Index::class)->name('categories.index');

    Route::get('/products', \App\Livewire\Product\Index::class)->name('products.index');
    Route::get('/sales', App\Livewire\Sale\Index::class)->name('sales.index');
    Route::get('/sale-items', App\Livewire\SaleItem\Index::class)->name('sale-items.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';
