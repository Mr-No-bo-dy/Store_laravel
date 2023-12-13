@extends('layouts.app')

@section('content')
<div class="text-gray-900">
    <h1>Add subcategory</h1>
    <form action="{{ route('admin.subcategoryStore') }}" method="post">
        @csrf

        <select name="id_category">
            @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ ucfirst($category->name) }}</option>
            @endforeach
        </select>
        <input type="text" name="name">
        <input type="text" name="description">
        <button class="text-blue-500 bg-white" type="submit" name="createSubcategory" value="1">Add Subcategory</button>
    </form>
</div>
@endsection
