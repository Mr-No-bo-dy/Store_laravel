@extends('layouts.app')

@section('content')
<div class="mx-20">
    <h1>Products</h1>
    <div><a class="text-blue-500 bg-green-300" href="{{ route('admin.product.create') }}">Create</a></div>

    @foreach ($products as $product)
    <div class="mt-4 @if(!is_null($product->deleted_at)) bg-red-300 @endif">
        <p><b>ID: {{ $product->id }}</b></p>
        <p>Name: {{ $product->name }}</p>
        <p>Description: {{ $product->description }}</p>
        <p>Status: {{ $product->status == 2 ? 'In stock' : ($product->status == 1 ? 'Coming soon' : 'Absent') }}</p>
        <p>Producer: {{ $product->id_producer }}</p>
        <p>Category: {{ $product->id_category }}</p>
        <p>Subcategory: {{ $product->id_subcategory }}</p>
        <div><a class="text-blue-500 bg-blue-300" href="{{ route('admin.product.show', $product->id) }}">Show</a></div>
        <div><a class="text-blue-500 bg-yellow-300" href="{{ route('admin.product.edit', $product->id) }}">Edit</a></div>
    </div>
    <form action="{{ route('admin.product.delete') }}" method="post">
        @csrf
        @method('delete')

        <input type="hidden" name="id" value="{{ $product->id }}">
        <button class="text-blue-500 bg-red-300" type="submit" name="deleteProduct" value="1">Delete Product</button>
    </form>
    <form action="{{ route('admin.product.restore') }}" method="post">
        @csrf
        @method('patch')

        <input type="hidden" name="id" value="{{ $product->id }}">
        <button class="text-blue-500 bg-green-300" type="submit" name="restoreProduct" value="1">Restore Product</button>
    </form>
    <form action="{{ route('admin.product.destroy') }}" method="post">
        @csrf
        @method('delete')

        <input type="hidden" name="id" value="{{ $product->id }}">
        <button class="text-blue-500 bg-red-500" type="submit" name="destroyProduct" value="1">Destroy Product</button>
    </form>
    @endforeach
</div>
@endsection
