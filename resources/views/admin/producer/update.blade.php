@extends('layouts.app')

@section('content')
<div class="text-gray-600">
    <h1>Update producer</h1>
    <form action="{{ route('admin.producer.update') }}" method="post">
        @csrf
        @method('patch')

        <input type="hidden" name="id" value="{{ $producer->id }}">
        <input type="text" name="name" value="{{ $producer->name }}">
        <input type="text" name="description" value="{{ $producer->description }}">
        <button class="text-blue-500 bg-white" type="submit" name="updateProducer" value="1">Update Producer</button>
    </form>
</div>
@endsection
