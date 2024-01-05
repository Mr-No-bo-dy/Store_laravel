<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the Products.
     *
     * @return View
     */
    public function index(): View
    {
        $products = Product::all();

        return view('product.index', compact('products'));
    }

    /**
     * Display the specified Product.
     *
     * @param int $idProduct
     * @return View
     */
    public function show(int $idProduct): View
    {
        $product = Product::findOrFail($idProduct);

        return view('product.show', compact('product'));
    }
}
