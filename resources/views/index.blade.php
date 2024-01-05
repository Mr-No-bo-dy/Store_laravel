{{-- @extends('layouts.pages') --}}
<x-pages-layout>
    <x-slot name="slot">

{{-- @section('content') --}}
        <div class="mx-20 py-2">
            <p>Hi, {{ Auth::user()->name ?? 'guest' }}</p>
        </div>
{{-- @endsection --}}
    </x-slot>
</x-pages-layout>
