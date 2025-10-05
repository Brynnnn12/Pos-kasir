<?php

namespace App\Livewire\Category;

use App\Models\Category;
use App\Services\CategoryService;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Gate;

class Index extends Component
{
    use WithPagination;

    protected $layout = 'components.layout.dashboard'; // Override global layout

    public $name;
    public $description;
    public $editingId = null;
    public $showModal = false;

    // Search & Pagination
    public $search = '';
    public $perPage = 10;
    public $sortBy = 'created_at';
    public $sortDirection = 'desc';

    protected CategoryService $categoryService;

    public function boot(CategoryService $categoryService): void
    {
        $this->categoryService = $categoryService;
    }

    public function create(): void
    {
        Gate::authorize('create', Category::class);

        $this->resetForm();
        $this->showModal = true;
    }

    public function store(): void
    {
        Gate::authorize('create', Category::class);

        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ], [
            'name.required' => 'Nama kategori harus diisi.',
            'name.string' => 'Nama kategori harus berupa teks.',
            'name.max' => 'Nama kategori tidak boleh lebih dari :max karakter.',
            'description.string' => 'Deskripsi harus berupa teks.',
            'description.max' => 'Deskripsi tidak boleh lebih dari :max karakter.',
        ]);

        $this->categoryService->create($validated);

        $this->resetForm();
        $this->js('Swal.fire({icon: "success", title: "Berhasil!", text: "Kategori berhasil dibuat.", toast: true, position: "top-end", showConfirmButton: false, timer: 3000})');
    }

    public function edit(int $id): void
    {
        $category = $this->categoryService->findById($id);
        Gate::authorize('update', $category);

        $this->editingId = $id;
        $this->name = $category->name;
        $this->description = $category->description;
        $this->showModal = true;
    }

    public function update(): void
    {
        $category = $this->categoryService->findById($this->editingId);
        Gate::authorize('update', $category);

        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ], [
            'name.required' => 'Nama kategori harus diisi.',
            'name.string' => 'Nama kategori harus berupa teks.',
            'name.max' => 'Nama kategori tidak boleh lebih dari :max karakter.',
            'description.string' => 'Deskripsi harus berupa teks.',
            'description.max' => 'Deskripsi tidak boleh lebih dari :max karakter.',
        ]);

        $this->categoryService->update($category, $validated);

        $this->resetForm();
        $this->js('Swal.fire({icon: "success", title: "Berhasil!", text: "Kategori berhasil diperbarui.", toast: true, position: "top-end", showConfirmButton: false, timer: 3000})');
    }

    public function delete(int $id): void
    {
        $category = $this->categoryService->findById($id);
        Gate::authorize('delete', $category);

        $this->categoryService->delete($category);

        $this->js('Swal.fire({icon: "success", title: "Berhasil!", text: "Kategori berhasil dihapus.", toast: true, position: "top-end", showConfirmButton: false, timer: 3000})');
    }

    private function resetForm(): void
    {
        $this->name = '';
        $this->description = '';
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

    public function sortBy($field)
    {
        if ($this->sortBy === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function render()
    {
        $query = Category::query();

        // Search functionality
        if ($this->search) {
            $query->where(function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            });
        }

        // Sorting
        $query->orderBy($this->sortBy, $this->sortDirection);

        return view('livewire.category.index', [
            'categories' => $query->paginate($this->perPage)
        ]);
    }
}
