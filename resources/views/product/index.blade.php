@extends('layouts.pages')

@section('content')
<div class="mx-20">
    <h1>Products</h1>

    @foreach ($products as $product)
    <div class="mt-4 @if(!is_null($product->deleted_at)) bg-red-300 @endif">
        <p><b>ID: {{ $product->id }}</b></p>
        <p>Name: {{ $product->name }}</p>
        <p>Description: {{ $product->description }}</p>
        <p>Status: {{ $product->status == 2 ? 'In stock' : ($product->status == 1 ? 'Coming soon' : 'Absent') }}</p>
        <p>Producer: {{ $product->id_producer }}</p>
        <p>Category: {{ $product->id_category }}</p>
        <p>Subcategory: {{ $product->id_subcategory }}</p>
        <div><a class="text-blue-500 bg-blue-300" href="{{ route('product.show', $product->id) }}">Show</a></div>
    </div>
    @endforeach
</div>
@endsection
