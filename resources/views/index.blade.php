{{-- @extends('layouts.pages') --}}
<x-pages-layout>
    <x-slot name="slot">

{{-- @section('content') --}}
    <p>Hi, {{ auth()->user()->name ?? 'guest' }}</p>
{{-- @endsection --}}
    </x-slot>
</x-pages-layout>