<?php

namespace App\Services;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Collection;

class CategoryService
{
    /**
     * Get all categories
     */
    public function getAll(): Collection
    {
        return Category::all();
    }

    /**
     * Find category by ID
     */
    public function findById(int $id): Category
    {
        return Category::findOrFail($id);
    }

    /**
     * Create new category
     */
    public function create(array $data): Category
    {
        return Category::create([
            'name' => $data['name'],
            'description' => $data['description'] ?? null,
        ]);
    }

    /**
     * Update existing category
     */
    public function update(Category $category, array $data): Category
    {
        $category->update([
            'name' => $data['name'],
            'description' => $data['description'] ?? null,
        ]);

        return $category->fresh();
    }

    /**
     * Delete category
     */
    public function delete(Category $category): bool
    {
        return $category->delete();
    }

    /**
     * Validate and create category
     */
    public function validateAndCreate(array $data): Category
    {
        // Basic validation
        $validated = validator($data, [
            'name' => 'required|string|max:255|unique:categories,name',
            'description' => 'nullable|string',
        ])->validate();

        return $this->create($validated);
    }

    /**
     * Validate and update category
     */
    public function validateAndUpdate(Category $category, array $data): Category
    {
        // Basic validation with unique check excluding current category
        $validated = validator($data, [
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'description' => 'nullable|string',
        ])->validate();

        return $this->update($category, $validated);
    }
}
