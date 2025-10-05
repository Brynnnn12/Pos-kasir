<?php

namespace App\Services;

use App\Models\Sale;

class SaleService
{
    public function create(array $data): Sale
    {
        return Sale::create($data);
    }

    public function update(Sale $sale, array $data): Sale
    {
        $sale->update($data);
        return $sale->fresh();
    }

    public function delete(Sale $sale): bool
    {
        return $sale->delete();
    }

    public function findById(int $id): Sale
    {
        return Sale::findOrFail($id);
    }

    public function getAll()
    {
        return Sale::all();
    }
}
