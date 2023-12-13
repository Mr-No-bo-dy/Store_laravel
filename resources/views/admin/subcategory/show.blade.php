@extends('layouts.app')

@section('content')
<h1>Subcategory ID: {{ $subcategory->id }}</h1>
{{--<p>Category...: {{ $subcategory->id_category }}</p>--}}
<p>Name: {{ $subcategory->name }}</p>
<p>Description: {{ $subcategory->description }}</p>
<div><a class="text-blue-500 bg-yellow-300" href="{{ route('admin.subcategoryEdit', $subcategory->id) }}">Edit</a></div>
<form action="{{ route('admin.subcategoryDestroy') }}" method="post">
    @csrf
    @method('delete')

    <input type="hidden" name="id" value="{{ $subcategory->id }}">
    <button class="text-blue-500 bg-red-500" type="submit" name="destroySubcategory" value="1">Destroy Subcategory</button>
</form>
@endsection
