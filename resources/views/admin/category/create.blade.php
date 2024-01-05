@extends('layouts.app')

@section('content')
<div class="mx-20 text-gray-900">
    <h1>Add category</h1>
    <form action="{{ route('admin.category.store') }}" method="post">
        @csrf

        <label class="block"><input type="text" name="name"></label>
        <a class="bg-gray-500" href="{{ route('admin.category.index') }}">{{ __('Cancel') }}</a>
        <button class="text-blue-500 bg-white" type="submit" name="createCategory" value="1">Add Category</button>
    </form>
</div>
@endsection
