@extends('layouts.app')

@section('content')
<div class="mx-20 text-gray-600">
    <h1>Update Product</h1>
    <form action="{{ route('admin.product.update') }}" method="post">
        @csrf
        @method('patch')

        <label class="block w-full">
            <select name="id_producer">{{ __('Producer') }}
                @foreach($producers as $producer)
                    <option value="{{ $producer->id }}" {{ old('id_producer', $product->id_producer) === $producer->id ? 'selected' : '' }}>{{ ucfirst($producer->name) }}</option>
                @endforeach
            </select>
        </label>
        <label class="block w-full">
            <select name="id_category">{{ __('Category') }}
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('id_category', $product->id_category) === $category->id ? 'selected' : '' }}>{{ ucfirst($category->name) }}</option>
                @endforeach
            </select>
        </label>
        <label class="block w-full">
            <select name="id_subcategory">{{ __('Subcategory') }}
                @foreach($subcategories as $subcategory)
                    <option value="{{ $subcategory->id }}" {{ old('id_subcategory', $product->id_subcategory) === $subcategory->id ? 'selected' : '' }}>{{ ucfirst($subcategory->name) }}</option>
                @endforeach
            </select>
        </label>
        <label class="block w-full">{{ __('Name') }}<input type="text" name="name" value="{{ old('name', $product->name) }}"></label>
        <label class="block w-full">{{ __('Description') }}<input type="text" name="description" value="{{ old('description', $product->description) }}"></label>
        <label for="status" class="block w-full">{{ __('Status') }}
            <select id="status" name="status">
                @foreach($statuses as $status)
                    <option value="{{ $status }}" {{ old('status', $product->status) === $status ? 'selected' : '' }}>
                        {{ $status == 2 ? 'In stock' : ($status == 1 ? 'Coming soon' : 'Absent') }}
                    </option>
                @endforeach
            </select>
            <button id="addNewStatus" class="bg-emerald-400" >{{ __('New Status') }}</button>
        </label>
        <label class="hidden w-full" for="status_new">{{ __('Status') }}
            <input id="status_new" type="hidden" name="" value="{{ old('status', $product->status) }}" required class="text-gray-900">
            <button id="removeNewStatus" class="bg-emerald-400" >{{ __('Existing Status') }}</button>
        </label>
        <input type="hidden" name="id" value="{{ $product->id }}">
        <a class="text-white bg-gray-500" href="{{ route('admin.product.index') }}">{{ __('Cancel') }}</a>
        <button class="text-blue-500 bg-white" type="submit" name="updateProduct" value="1">Update Product</button>
    </form>
</div>
@endsection
