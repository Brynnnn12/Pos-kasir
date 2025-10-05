<?php

namespace App\Services;

use App\Models\SaleItem;

class SaleItemService
{
    public function create(array $data): SaleItem
    {
        return SaleItem::create($data);
    }

    public function update(SaleItem $saleItem, array $data): SaleItem
    {
        $saleItem->update($data);
        return $saleItem->fresh();
    }

    public function delete(SaleItem $saleItem): bool
    {
        return $saleItem->delete();
    }

    public function findById(int $id): SaleItem
    {
        return SaleItem::findOrFail($id);
    }

    public function getAll()
    {
        return SaleItem::all();
    }
}
