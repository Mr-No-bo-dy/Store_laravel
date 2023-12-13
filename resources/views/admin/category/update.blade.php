@extends('layouts.app')

@section('content')
<div class="text-gray-600">
    <h1>Update category</h1>
    <form action="{{ route('admin.categoryUpdate') }}" method="post">
        @csrf
        @method('patch')

        <input type="hidden" name="id" value="{{ $category->id }}">
        <input type="text" name="name" value="{{ $category->name }}">
        <button class="text-blue-500 bg-white" type="submit" name="updateCategory" value="1">Update Category</button>
    </form>
</div>
@endsection
