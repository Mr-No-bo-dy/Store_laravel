@extends('layouts.app')

@section('content')
<h1>Producer #{{ $producer->id }}</h1>
<p>Name: {{ $producer->name }}</p>
<p>Description: {{ $producer->description }}</p>
<div><a class="text-blue-500 bg-yellow-300" href="{{ route('admin.producerEdit', $producer->id) }}">Edit</a></div>
<form action="{{ route('admin.producerDestroy') }}" method="post">
    @csrf
    @method('delete')

    <input type="hidden" name="id" value="{{ $producer->id }}">
    <button class="text-blue-500 bg-red-500" type="submit" name="destroyProducer" value="1">Destroy Producer</button>
</form>
@endsection
