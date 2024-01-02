@extends('layouts.app')

@section('content')
<div class="text-gray-900">
    <h1>Add category</h1>
    <form action="{{ route('admin.category.store') }}" method="post">
        @csrf

        <input type="text" name="name">
        <button class="text-blue-500 bg-white" type="submit" name="createCategory" value="1">Add Category</button>
    </form>
</div>
@endsection
