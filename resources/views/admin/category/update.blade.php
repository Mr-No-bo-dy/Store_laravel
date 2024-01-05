@extends('layouts.app')

@section('content')
<div class="mx-20 text-gray-600">
    <h1>Update category</h1>
    <form action="{{ route('admin.category.update') }}" method="post">
        @csrf
        @method('patch')

        <label class="block"><input type="hidden" name="id" value="{{ $category->id }}"></label>
        <label class="block"><input type="text" name="name" value="{{ $category->name }}"></label>
        <a class="bg-gray-500" href="{{ route('admin.category.index') }}">{{ __('Cancel') }}</a>
        <button class="text-blue-500 bg-white" type="submit" name="updateCategory" value="1">Update Category</button>
    </form>
</div>
@endsection
