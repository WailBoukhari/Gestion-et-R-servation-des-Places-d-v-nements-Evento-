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
        // Check if the user has permission to create categories
        if (!auth()->user()->hasPermissionTo('create categories')) {
            abort(403, 'Unauthorized action.');
        }

        // Validate the request data
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories',
            'image' => 'required|image',
        ]);

        // Upload the image
        $imagePath = $request->file('image')->store('category_images', 'public');

        // Create the category with the image path
        $category = Category::create([

            'name' => $validated['name'],
            'image' => $imagePath,
        ]);

        // Redirect with success message
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
        // Check if the user has permission to edit categories
        if (!auth()->user()->hasPermissionTo('edit categories')) {
            abort(403, 'Unauthorized action.');
        }

        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'image' => 'nullable|image',
        ]);

        // Update category name
        $category->update([
            'name' => $request->name,
        ]);

        // Check if an image file was uploaded
        if ($request->hasFile('image')) {
            // Store the image in the specified directory
            $imagePath = $request->file('image')->store('category_images', 'public');

            // Update the category's image path
            $category->update([
                'image' => $imagePath,
            ]);
        }

        // Redirect back to the categories index page with a success message
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
