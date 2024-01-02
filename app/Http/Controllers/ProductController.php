<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the Products.
     */
    public function index()
    {
        $products = Product::withTrashed()->get();

        return view('product.index', compact('products'));
    }

    /**
     * Display the specified Product.
     */
    public function show(int $idProduct)
    {
        $product = Product::findOrFail($idProduct);

        return view('product.show', compact('product'));
    }
}
