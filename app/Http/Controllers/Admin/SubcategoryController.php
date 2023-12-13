<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategories = Subcategory::withTrashed()->get();

        return view('admin.subcategory.index', compact('subcategories'));
    }

    /**
     * Display the specified resource.
     */
    public function show($idSubcategory)
    {
        $subcategory = Subcategory::findOrFail($idSubcategory);

        return view('admin.subcategory.show', compact('subcategory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::withTrashed()->get();

        return view('admin.subcategory.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'id_category' => $request->post('id_category'),
            'name' => $request->post('name'),
            'description' => $request->post('description'),
        ];
        Subcategory::create($data);

        return redirect()->route('admin.subcategories');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($idSubcategory)
    {
        $categories = Category::withTrashed()->get();
        $subcategory = Subcategory::findOrFail($idSubcategory);

        return view('admin.subcategory.update', compact('categories', 'subcategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
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

        return redirect()->route('admin.subcategories');
    }

    /**
     * Soft-Delete the specified resource in storage.
     */
    public function delete(Request $request)
    {
        if ($request->has('deleteSubcategory')) {
            $idSubcategory = $request->post('id');
            Subcategory::findOrFail($idSubcategory)->delete();
        }

        return back();
    }

    /**
     * Restore the specified resource in storage.
     */
    public function restore(Request $request)
    {
        if ($request->has('restoreSubcategory')) {
            $idSubcategory = $request->post('id');
            Subcategory::onlyTrashed()->findOrFail($idSubcategory)->restore();
        }

        return back();
    }

    /**
     * Delete the specified resource in storage.
     */
    public function destroy(Request $request)
    {
        if ($request->has('destroySubcategory')) {
            $idSubcategory = $request->post('id');
            Subcategory::withTrashed()->findOrFail($idSubcategory)->forceDelete();
        }

        return back();
    }
}
