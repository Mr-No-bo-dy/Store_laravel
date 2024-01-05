@extends('layouts.app')

@section('content')
<div class="mx-20 text-gray-900">
    <h1>Add producer</h1>
    <form action="{{ route('admin.producer.store') }}" method="post">
        @csrf

        <label class="block"><input type="text" name="name"></label>
        <label class="block"><input type="text" name="description"></label>
        <a class="bg-gray-500" href="{{ route('admin.producer.index') }}">{{ __('Cancel') }}</a>
        <button class="text-blue-500 bg-white" type="submit" name="createProducer" value="1">Add Producer</button>
    </form>
</div>
@endsection
