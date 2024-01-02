@extends('layouts.app')

@section('content')
<div class="text-gray-900">
    <h1>Add product</h1>
    <form action="{{ route('admin.product.store') }}" method="post">
        @csrf

        <select name="id_category">
            @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ ucfirst($category->name) }}</option>
            @endforeach
        </select>
        <select name="id_producer">
            @foreach($producers as $producer)
            <option value="{{ $producer->id }}">{{ ucfirst($producer->name) }}</option>
            @endforeach
        </select>
        <select name="id_subcategory">
            @foreach($subcategories as $subcategory)
            <option value="{{ $subcategory->id }}">{{ ucfirst($subcategory->name) }}</option>
            @endforeach
        </select>
        <input type="text" name="name">
        <input type="text" name="description">
        <select name="status">
            @foreach($statuses as $status)
                <option value="{{ $status }}">{{ $status == 2 ? 'Є в наявності' : ($status == 1 ? 'Їде від постачальника' : 'Немає') }}</option>
            @endforeach
        </select>
        <button class="text-blue-500 bg-white" type="submit" name="createProduct" value="1">Add Product</button>
    </form>
</div>
@endsection
