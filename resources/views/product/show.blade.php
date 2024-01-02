@extends('layouts.app')

@section('content')
<h1>Product ID: {{ $product->id }}</h1>
<p>Producer: {{ $product->id_producer }}</p>
<p>Category: {{ $product->id_category }}</p>
<p>Subcategory: {{ $product->id_subcategory }}</p>
<p>Name: {{ $product->name }}</p>
<p>Description: {{ $product->description }}</p>
<p>Status: {{ $product->status == 2 ? 'Є в наявності' : ($product->status == 1 ? 'Їде від постачальника' : 'Немає') }}</p>
<div><a class="text-blue-500 bg-yellow-300" href="{{ route('admin.product.edit', $product->id) }}">Edit</a></div>
<form action="{{ route('admin.product.destroy') }}" method="post">
    @csrf
    @method('delete')

    <input type="hidden" name="id" value="{{ $product->id }}">
    <button class="text-blue-500 bg-red-500" type="submit" name="destroyProduct" value="1">Destroy Product</button>
</form>
@endsection
