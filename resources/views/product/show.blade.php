@extends('layouts.pages')

@section('content')
<div class="mx-20">
    <h1>Product ID: {{ $product->id }}</h1>
    <p>Producer: {{ $product->id_producer }}</p>
    <p>Category: {{ $product->id_category }}</p>
    <p>Subcategory: {{ $product->id_subcategory }}</p>
    <p>Name: {{ $product->name }}</p>
    <p>Description: {{ $product->description }}</p>
    <p>Status: {{ $product->status == 2 ? 'In stock' : ($product->status == 1 ? 'Coming soon' : 'Absent') }}</p>
</div>
@endsection
