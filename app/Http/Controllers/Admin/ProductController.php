<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Producer;
use App\Models\Admin\Subcategory;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Show the form for creating a new Product.
     *
     * @return View
     */
    public function create(): View
    {
        $producers = Producer::all(['id', 'name']);
        $categories = Category::all(['id', 'name']);
        $subcategories = Subcategory::all(['id', 'name']);
        $statuses = Product::distinct()->withTrashed()->orderBy('status', 'asc')->pluck('status')->all();

        return view('product.create', compact('producers', 'categories', 'subcategories', 'statuses'));
    }

    /**
     * Store a newly created Product in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $data = [
            'id_producer' => $request->post('id_producer'),
            'id_category' => $request->post('id_category'),
            'id_subcategory' => $request->post('id_subcategory'),
            'name' => $request->post('name'),
            'description' => $request->post('description'),
            'status' => 0,
        ];
        Product::create($data);

        return redirect()->route('product.index');
    }

    /**
     * Show the form for editing the specified Product.
     *
     * @param int $idProduct
     * @return View
     */
    public function edit(int $idProduct): View
    {
        $producers = Producer::all(['id', 'name']);
        $categories = Category::all(['id', 'name']);
        $subcategories = Subcategory::all(['id', 'name']);
        $product = Product::findOrFail($idProduct);
        $statuses = Product::distinct()->withTrashed()->orderBy('status', 'asc')->pluck('status')->all();

        return view('product.update', compact('producers', 'categories', 'subcategories', 'statuses', 'product'));
    }

    /**
     * Update the specified Product in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request): RedirectResponse
    {
        $idProduct = $request->post('id');
        $data = [
            'id_producer' => $request->post('id_producer'),
            'id_category' => $request->post('id_category'),
            'id_subcategory' => $request->post('id_subcategory'),
            'name' => $request->post('name'),
            'description' => $request->post('description'),
            'status' => $request->post('status'),
        ];

        $product = Product::findOrFail($idProduct);
        $product->fill($data);
        if ($product->isDirty()) {
            $product->save();
        }

        return redirect()->route('product.index');
    }

    /**
     * Soft-Delete the specified Product in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function delete(Request $request): RedirectResponse
    {
        if ($request->has('deleteProduct')) {
            $idProduct = $request->post('id');
            Product::findOrFail($idProduct)->delete();
        }

        return back();
    }

    /**
     * Restore the specified Product in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function restore(Request $request): RedirectResponse
    {
        if ($request->has('restoreProduct')) {
            $idProduct = $request->post('id');
            Product::withTrashed()->findOrFail($idProduct)->restore();
        }

        return back();
    }

    /**
     * Delete the specified Product in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function destroy(Request $request): RedirectResponse
    {
        if ($request->has('destroyProduct')) {
            $idProduct = $request->post('id');
            Product::withTrashed()->findOrFail($idProduct)->forceDelete();
        }

        return back();
    }
}
