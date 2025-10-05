<?php

namespace App\Livewire\Product;

use App\Models\Product;
use App\Services\ProductService;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    use WithPagination, WithFileUploads;

    public $category_id;
    public $name;
    public $price;
    public $stock;
    public $image;
    public $editingId = null;
    public $showModal = false;

    protected ProductService $productService;

    public function boot(ProductService $productService): void
    {
        $this->productService = $productService;
    }

    public function create(): void
    {
        Gate::authorize('create', Product::class);

        $this->resetForm();
        $this->showModal = true;
    }

    public function store(): void
    {
        Gate::authorize('create', Product::class);

        $validated = $this->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'category_id.required' => 'Category is required.',
            'category_id.exists' => 'Selected category does not exist.',
            'name.required' => 'Product name is required.',
            'name.max' => 'Product name cannot exceed 255 characters.',
            'price.required' => 'Price is required.',
            'price.numeric' => 'Price must be a valid number.',
            'price.min' => 'Price cannot be negative.',
            'stock.required' => 'Stock quantity is required.',
            'stock.integer' => 'Stock must be a whole number.',
            'stock.min' => 'Stock cannot be negative.',
            'image.image' => 'File must be an image.',
            'image.mimes' => 'Image must be in JPEG, PNG, JPG, or GIF format.',
            'image.max' => 'Image size cannot exceed 2MB.',
        ]);

        // Handle image upload
        if ($this->image) {
            $validated['image'] = $this->image->store('products', 'public');
        }

        $this->productService->create($validated);

        $this->resetForm();
        $this->js('Swal.fire({icon: "success", title: "Success!", text: "Product created successfully.", toast: true, position: "top-end", showConfirmButton: false, timer: 3000})');
    }

    public function edit(int $id): void
    {
        $product = $this->productService->findById($id);
        Gate::authorize('update', $product);

        $this->editingId = $id;
        $this->category_id = $product->category_id;
        $this->name = $product->name;
        $this->price = $product->price;
        $this->stock = $product->stock;
        $this->image = null; // Reset file upload
        $this->showModal = true;
    }

    public function update(): void
    {
        $product = $this->productService->findById($this->editingId);
        Gate::authorize('update', $product);

        $validated = $this->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'category_id.required' => 'Category is required.',
            'category_id.exists' => 'Selected category does not exist.',
            'name.required' => 'Product name is required.',
            'name.max' => 'Product name cannot exceed 255 characters.',
            'price.required' => 'Price is required.',
            'price.numeric' => 'Price must be a valid number.',
            'price.min' => 'Price cannot be negative.',
            'stock.required' => 'Stock quantity is required.',
            'stock.integer' => 'Stock must be a whole number.',
            'stock.min' => 'Stock cannot be negative.',
            'image.image' => 'File must be an image.',
            'image.mimes' => 'Image must be in JPEG, PNG, JPG, or GIF format.',
            'image.max' => 'Image size cannot exceed 2MB.',
        ]);

        // Handle image upload
        if ($this->image) {
            // Delete old image if exists
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $validated['image'] = $this->image->store('products', 'public');
        }

        $this->productService->update($product, $validated);

        $this->resetForm();
        $this->js('Swal.fire({icon: "success", title: "Success!", text: "Product updated successfully.", toast: true, position: "top-end", showConfirmButton: false, timer: 3000})');
    }

    public function delete(int $id): void
    {
        $product = $this->productService->findById($id);
        Gate::authorize('delete', $product);

        // Delete image if exists
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $this->productService->delete($product);

        $this->js('Swal.fire({icon: "success", title: "Success!", text: "Product deleted successfully.", toast: true, position: "top-end", showConfirmButton: false, timer: 3000})');
    }

    private function resetForm(): void
    {
        $this->category_id = '';
        $this->name = '';
        $this->price = '';
        $this->stock = '';
        $this->image = null;
        $this->editingId = null;
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.product.index', [
            'products' => Product::with('category')->latest()->paginate(10)
        ]);
    }
}
