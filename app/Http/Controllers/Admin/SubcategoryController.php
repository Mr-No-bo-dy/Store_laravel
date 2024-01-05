<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Subcategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $subcategories = Subcategory::withTrashed()->get();

        return view('admin.subcategory.index', compact('subcategories'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $idSubcategory
     * @return View
     */
    public function show(int $idSubcategory): View
    {
        $subcategory = Subcategory::withTrashed()->findOrFail($idSubcategory);

        return view('admin.subcategory.show', compact('subcategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $categories = Category::all(['id', 'name']);

        return view('admin.subcategory.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $data = [
            'id_category' => $request->post('id_category'),
            'name' => $request->post('name'),
            'description' => $request->post('description'),
        ];
        Subcategory::create($data);

        return redirect()->route('admin.subcategory.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $idSubcategory
     * @return View
     */
    public function edit(int $idSubcategory): View
    {
        $categories = Category::all(['id', 'name']);
        $subcategory = Subcategory::findOrFail($idSubcategory);

        return view('admin.subcategory.update', compact('categories', 'subcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request): RedirectResponse
    {
        $idSubcategory = $request->post('id');
        $setSubcategoryData = [
            'id_category' => $request->post('id_category'),
            'name' => $request->post('name'),
            'description' => $request->post('description'),
        ];

        $subcategory = Subcategory::findOrFail($idSubcategory);
        $subcategory->fill($setSubcategoryData);
        if ($subcategory->isDirty()) {
            $subcategory->save();
        }

        return redirect()->route('admin.subcategory.index');
    }

    /**
     * Soft-Delete the specified resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function delete(Request $request): RedirectResponse
    {
        if ($request->has('deleteSubcategory')) {
            $idSubcategory = $request->post('id');
            Subcategory::findOrFail($idSubcategory)->delete();
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
        if ($request->has('restoreSubcategory')) {
            $idSubcategory = $request->post('id');
            Subcategory::onlyTrashed()->findOrFail($idSubcategory)->restore();
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
        if ($request->has('destroySubcategory')) {
            $idSubcategory = $request->post('id');
            Subcategory::withTrashed()->findOrFail($idSubcategory)->forceDelete();
        }

        return back();
    }
}
