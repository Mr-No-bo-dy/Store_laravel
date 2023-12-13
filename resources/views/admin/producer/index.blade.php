@extends('layouts.app')

@section('content')
<div class="wrapper mx-20">
    <h1>Producers</h1>
    <div><a class="text-blue-500 bg-green-300" href="{{ route('admin.producerCreate') }}">Create</a></div>

    @foreach ($producers as $producer)
    <div class="mt-4 @if(!is_null($producer->deleted_at)) bg-red-300 @endif">
        <p><b>ID: {{ $producer->id }}</b></p>
        <p>Name: {{ $producer->name }}</p>
        <p>Description: {{ $producer->description }}</p>
        <div><a class="text-blue-500 bg-blue-300" href="{{ route('admin.producerShow', $producer->id) }}">Show</a></div>
        <div><a class="text-blue-500 bg-yellow-300" href="{{ route('admin.producerEdit', $producer->id) }}">Edit</a></div>
    </div>
    <form action="{{ route('admin.producerDelete') }}" method="post">
        @csrf
        @method('delete')

        <input type="hidden" name="id" value="{{ $producer->id }}">
        <button class="text-blue-500 bg-red-300" type="submit" name="deleteProducer" value="1">Delete Producer</button>
    </form>
    <form action="{{ route('admin.producerRestore') }}" method="post">
        @csrf
        @method('patch')

        <input type="hidden" name="id" value="{{ $producer->id }}">
        <button class="text-blue-500 bg-green-300" type="submit" name="restoreProducer" value="1">Restore Producer</button>
    </form>
    <form action="{{ route('admin.producerDestroy') }}" method="post">
        @csrf
        @method('delete')

        <input type="hidden" name="id" value="{{ $producer->id }}">
        <button class="text-blue-500 bg-red-500" type="submit" name="destroyProducer" value="1">Destroy Producer</button>
    </form>
    @endforeach
</div>
@endsection
