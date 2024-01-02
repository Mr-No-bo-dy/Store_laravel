@extends('layouts.app')

@section('content')
<div class="text-gray-600">
    <h1>Update Subcategory</h1>
    <form action="{{ route('admin.subcategory.update') }}" method="post">
        @csrf
        @method('patch')

        <select name="id_category">
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id !== $subcategory->id_category ?: 'selected' }}>{{ ucfirst($category->name) }}</option>
            @endforeach
        </select>
        <input type="hidden" name="id" value="{{ $subcategory->id }}">
        <input type="text" name="name" value="{{ old('name', $subcategory->name) }}">
        <input type="text" name="description" value="{{ old('description', $subcategory->description) }}">
        <button class="text-blue-500 bg-white" type="submit" name="updateSubcategory" value="1">Update Subcategory</button>
    </form>
</div>
@endsection
