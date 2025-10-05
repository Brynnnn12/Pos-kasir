<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class ProductService
{
    public function getAll(): Collection
    {
        return Product::with('category')->get();
    }

    public function getPaginated(int $perPage = 10): LengthAwarePaginator
    {
        return Product::with('category')->latest()->paginate($perPage);
    }

    public function findById(int $id): Product
    {
        return Product::with('category')->findOrFail($id);
    }

    public function create(array $data): Product
    {
        return Product::create($data);
    }

    public function update(Product $product, array $data): Product
    {
        $product->update($data);
        return $product->fresh('category');
    }

    public function delete(Product $product): bool
    {
        return $product->delete();
    }

    public function validateAndCreate(array $data): Product
    {
        // Additional business logic validation can be added here
        return $this->create($data);
    }

    public function validateAndUpdate(Product $product, array $data): Product
    {
        // Additional business logic validation can be added here
        return $this->update($product, $data);
    }

    public function getByCategory(int $categoryId): Collection
    {
        return Product::where('category_id', $categoryId)->with('category')->get();
    }

    public function updateStock(Product $product, int $quantity): Product
    {
        $product->increment('stock', $quantity);
        return $product->fresh();
    }

    public function decreaseStock(Product $product, int $quantity): Product
    {
        $product->decrement('stock', $quantity);
        return $product->fresh();
    }
}
