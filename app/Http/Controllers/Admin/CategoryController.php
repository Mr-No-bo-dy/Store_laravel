<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $categories = Category::withTrashed()->get();

        return view('admin.category.index', compact('categories'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $idCategory
     * @return View
     */
    public function show(int $idCategory): View
    {
        $category = Category::findOrFail($idCategory);

        return view('admin.category.show', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Category::create(['name' => $request->post('name')]);

        return redirect()->route('admin.category.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $idCategory
     * @return View
     */
    public function edit(int $idCategory): View
    {
        $category = Category::findOrFail($idCategory);

        return view('admin.category.update', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request): RedirectResponse
    {
        $idCategory = $request->post('id');

        $category = Category::findOrFail($idCategory);
        $category->fill(['name' => $request->post('name')]);
        if ($category->isDirty()) {
            $category->save();
        }

        return redirect()->route('admin.category.index');
    }

    /**
     * Soft-Delete the specified resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function delete(Request $request): RedirectResponse
    {
        if ($request->has('deleteCategory')) {
            $idCategory = $request->post('id');
            Category::findOrFail($idCategory)->delete();
        }

        return back();
    }

    /**
     * Restore the specified resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function restore(Request $request): RedirectResponse
    {
        if ($request->has('restoreCategory')) {
            $idCategory = $request->post('id');
            Category::onlyTrashed()->findOrFail($idCategory)->restore();
        }

        return back();
    }

    /**
     * Delete the specified resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function destroy(Request $request): RedirectResponse
    {
        if ($request->has('destroyCategory')) {
            $idCategory = $request->post('id');
            Category::withTrashed()->findOrFail($idCategory)->forceDelete();
        }

        return back();
    }
}
