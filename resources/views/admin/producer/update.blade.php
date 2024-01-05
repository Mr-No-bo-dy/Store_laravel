@extends('layouts.app')

@section('content')
<div class="mx-20 text-gray-600">
    <h1>Update producer</h1>
    <form action="{{ route('admin.producer.update') }}" method="post">
        @csrf
        @method('patch')

        <label class="block"><input type="hidden" name="id" value="{{ $producer->id }}"></label>
        <label class="block"><input type="text" name="name" value="{{ $producer->name }}"></label>
        <label class="block"><input type="text" name="description" value="{{ $producer->description }}"></label>
        <a class="bg-gray-500" href="{{ route('admin.producer.index') }}">{{ __('Cancel') }}</a>
        <button class="text-blue-500 bg-white" type="submit" name="updateProducer" value="1">Update Producer</button>
    </form>
</div>
@endsection
