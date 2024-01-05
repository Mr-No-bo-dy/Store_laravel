@extends('layouts.app')

@section('content')
<div class="mx-20">
    <h1>Categories</h1>
    <div><a class="text-blue-500 bg-green-300" href="{{ route('admin.category.create') }}">Create</a></div>

    @foreach ($categories as $category)
    <div class="mt-4 @if(!is_null($category->deleted_at)) bg-red-300 @endif">
        <p><b>ID: {{ $category->id }}</b></p>
        <p>Name: {{ $category->name }}</p>
        <div><a class="text-blue-500 bg-blue-300" href="{{ route('admin.category.show', $category->id) }}">Show</a></div>
        <div><a class="text-blue-500 bg-yellow-300" href="{{ route('admin.category.edit', $category->id) }}">Edit</a></div>
    </div>
    <form action="{{ route('admin.category.delete') }}" method="post">
        @csrf
        @method('delete')

        <input type="hidden" name="id" value="{{ $category->id }}">
        <button class="text-blue-500 bg-red-300" type="submit" name="deleteCategory" value="1">Delete Category</button>
    </form>
    <form action="{{ route('admin.category.restore') }}" method="post">
        @csrf
        @method('patch')

        <input type="hidden" name="id" value="{{ $category->id }}">
        <button class="text-blue-500 bg-green-300" type="submit" name="restoreCategory" value="1">Restore Category</button>
    </form>
    <form action="{{ route('admin.category.destroy') }}" method="post">
        @csrf
        @method('delete')

        <input type="hidden" name="id" value="{{ $category->id }}">
        <button class="text-blue-500 bg-red-500" type="submit" name="destroyCategory" value="1">Destroy Category</button>
    </form>
    @endforeach
</div>
@endsection
