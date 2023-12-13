<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::withTrashed()->get();

        return view('admin.category.index', compact('categories'));
    }

    /**
     * Display the specified resource.
     */
    public function show($idCategory)
    {
        $category = Category::findOrFail($idCategory);

        return view('admin.category.show', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Category::create(['name' => $request->post('name')]);

        return redirect()->route('admin.categories');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($idCategory)
    {
        $category = Category::findOrFail($idCategory);

        return view('admin.category.update', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $idCategory = $request->post('id');

        $category = Category::findOrFail($idCategory);
        $category->fill(['name' => $request->post('name')]);
        if ($category->isDirty()) {
            $category->save();
        }

        return redirect()->route('admin.categories');
    }

    /**
     * Soft-Delete the specified resource in storage.
     */
    public function delete(Request $request)
    {
        if ($request->has('deleteCategory')) {
            $idCategory = $request->post('id');
            Category::findOrFail($idCategory)->delete();
        }

        return back();
    }

    /**
     * Restore the specified resource in storage.
     */
    public function restore(Request $request)
    {
        if ($request->has('restoreCategory')) {
            $idCategory = $request->post('id');
            Category::onlyTrashed()->findOrFail($idCategory)->restore();
        }

        return back();
    }

    /**
     * Delete the specified resource in storage.
     */
    public function destroy(Request $request)
    {
        if ($request->has('destroyCategory')) {
            $idCategory = $request->post('id');
            Category::withTrashed()->findOrFail($idCategory)->forceDelete();
        }

        return back();
    }
}
