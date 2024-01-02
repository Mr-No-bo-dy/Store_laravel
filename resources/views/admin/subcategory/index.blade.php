@extends('layouts.app')

@section('content')
<div class="wrapper mx-20">
    <h1>SubCategories</h1>
    <div><a class="text-blue-500 bg-green-300" href="{{ route('admin.subcategory.create') }}">Create</a></div>

    @foreach ($subcategories as $subcategory)
    <div class="mt-4 @if(!is_null($subcategory->deleted_at)) bg-red-300 @endif">
        <p><b>ID: {{ $subcategory->id }}</b></p>
{{--        <p>Category...: {{ $subcategory->id_category }}</p>--}}
        <p>Name: {{ $subcategory->name }}</p>
        <p>Description: {{ $subcategory->description }}</p>
        <div><a class="text-blue-500 bg-blue-300" href="{{ route('admin.subcategory.show', $subcategory->id) }}">Show</a></div>
        <div><a class="text-blue-500 bg-yellow-300" href="{{ route('admin.subcategory.edit', $subcategory->id) }}">Edit</a></div>
    </div>
    <form action="{{ route('admin.subcategory.delete') }}" method="post">
        @csrf
        @method('delete')

        <input type="hidden" name="id" value="{{ $subcategory->id }}">
        <button class="text-blue-500 bg-red-300" type="submit" name="deleteSubcategory" value="1">Delete Subcategory</button>
    </form>
    <form action="{{ route('admin.subcategory.restore') }}" method="post">
        @csrf
        @method('patch')

        <input type="hidden" name="id" value="{{ $subcategory->id }}">
        <button class="text-blue-500 bg-green-300" type="submit" name="restoreSubcategory" value="1">Restore Subcategory</button>
    </form>
    <form action="{{ route('admin.subcategory.destroy') }}" method="post">
        @csrf
        @method('delete')

        <input type="hidden" name="id" value="{{ $subcategory->id }}">
        <button class="text-blue-500 bg-red-500" type="submit" name="destroySubcategory" value="1">Destroy Subcategory</button>
    </form>
    @endforeach
</div>
@endsection
