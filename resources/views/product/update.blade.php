@extends('layouts.app')

@section('content')
<div class="text-gray-600">
    <h1>Update Product</h1>
    <form action="{{ route('admin.product.update') }}" method="post">
        @csrf
        @method('patch')

        <select name="id_producer">
            @foreach($producers as $producer)
                <option value="{{ $producer->id }}" {{ $producer->id !== $product->id_product ?: 'selected' }}>{{ ucfirst($producer->name) }}</option>
            @endforeach
        </select>
        <select name="id_category">
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id !== $product->id_category ?: 'selected' }}>{{ ucfirst($category->name) }}</option>
            @endforeach
        </select>
        <select name="id_subcategory">
            @foreach($subcategories as $subcategory)
                <option value="{{ $subcategory->id }}" {{ $subcategory->id !== $product->id_category ?: 'selected' }}>{{ ucfirst($subcategory->name) }}</option>
            @endforeach
        </select>
        <input type="hidden" name="id" value="{{ $product->id }}">
        <input type="text" name="name" value="{{ old('name', $product->name) }}">
        <input type="text" name="description" value="{{ old('description', $product->description) }}">
        <select name="status">
            @foreach($statuses as $status)
                <option value="{{ $status }}">{{ $status == 2 ? 'Є в наявності' : ($status == 1 ? 'Їде від постачальника' : 'Немає') }}</option>
            @endforeach
        </select>
        <button class="text-blue-500 bg-white" type="submit" name="updateProduct" value="1">Update Product</button>
    </form>
</div>
@endsection
