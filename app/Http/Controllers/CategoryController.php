<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Authorization check
        Gate::authorize('viewAny', Category::class);

        $categories = $this->categoryService->getAll();

        // Return JSON for API, view for web
        if ($request->expectsJson()) {
            return response()->json($categories);
        }

        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Category::class);
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'description' => 'nullable|string',
        ]);

        // Authorization check
        Gate::authorize('create', Category::class);

        $category = $this->categoryService->create($request->only(['name', 'description']));

        if ($request->expectsJson()) {
            return response()->json($category, 201);
        }

        return redirect()->route('categories.index')
            ->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Category $category)
    {
        Gate::authorize('view', $category);

        if ($request->expectsJson()) {
            return response()->json($category);
        }

        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        Gate::authorize('update', $category);
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'description' => 'nullable|string',
        ]);

        // Authorization check
        Gate::authorize('update', $category);

        $this->categoryService->update($category, $request->only(['name', 'description']));

        if ($request->expectsJson()) {
            return response()->json($category->fresh());
        }

        return redirect()->route('categories.index')
            ->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Category $category)
    {
        Gate::authorize('delete', $category);

        $this->categoryService->delete($category);

        if ($request->expectsJson()) {
            return response()->json(['message' => 'Category deleted successfully']);
        }

        return redirect()->route('categories.index')
            ->with('success', 'Category deleted successfully.');
    }
}
