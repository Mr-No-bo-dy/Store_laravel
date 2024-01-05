@extends('layouts.app')

@section('content')
<div class="mx-20 text-gray-900">
    <h1>Add subcategory</h1>
    <form action="{{ route('admin.subcategory.store') }}" method="post">
        @csrf

        <label class="block"><select name="id_category">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ ucfirst($category->name) }}</option>
                @endforeach
            </select>
        </label>
        <label class="block"><input type="text" name="name"></label>
        <label class="block"><input type="text" name="description"></label>
        <a class="bg-gray-500" href="{{ route('admin.subcategory.index') }}">{{ __('Cancel') }}</a>
        <button class="text-blue-500 bg-white" type="submit" name="createSubcategory" value="1">Add Subcategory</button>
    </form>
</div>
@endsection
