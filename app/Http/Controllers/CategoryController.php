<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        if (!auth()->user()->hasPermissionTo('manage categories')) {
            abort(403, 'Unauthorized action.');
        }

        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        if (!auth()->user()->hasPermissionTo('create categories')) {
            abort(403, 'Unauthorized action.');
        }

        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        if (!auth()->user()->hasPermissionTo('create categories')) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories',
            'image' => 'required|image',
        ]);

        $imagePath = $request->file('image')->store('category_images', 'public');
        $validated['image'] = $imagePath;

        Category::create($validated);

        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
    }

    public function edit(Category $category)
    {
        if (!auth()->user()->hasPermissionTo('edit categories')) {
            abort(403, 'Unauthorized action.');
        }

        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        if (!auth()->user()->hasPermissionTo('edit categories')) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'image' => 'required|image',
        ]);

        $category->update($request->all());

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        if (!auth()->user()->hasPermissionTo('delete categories')) {
            abort(403, 'Unauthorized action.');
        }

        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
    }

}
