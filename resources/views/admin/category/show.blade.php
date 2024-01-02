@extends('layouts.app')

@section('content')
<h1>Category #{{ $category->id }}</h1>
<p>Name: {{ $category->name }}</p>
<div><a class="text-blue-500 bg-yellow-300" href="{{ route('admin.category.edit', $category->id) }}">Edit</a></div>
<form action="{{ route('admin.category.destroy') }}" method="post">
    @csrf
    @method('delete')

    <input type="hidden" name="id" value="{{ $category->id }}">
    <button class="text-blue-500 bg-red-500" type="submit" name="destroyCategory" value="1">Destroy Category</button>
</form>
@endsection
