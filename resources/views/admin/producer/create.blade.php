@extends('layouts.app')

@section('content')
<div class="text-gray-900">
    <h1>Add producer</h1>
    <form action="{{ route('admin.producerCreate') }}" method="post">
        @csrf

        <input type="text" name="name">
        <input type="text" name="description">
        <button class="text-blue-500 bg-white" type="submit" name="createProducer" value="1">Add Produceer</button>
    </form>
</div>
@endsection