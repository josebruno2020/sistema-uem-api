@extends('layouts.layout-module')

@section('title', $module->name)

@section('content')

<main class="container mt-3">
{{-- @php
    dd($module);
@endphp --}}
<h1>Modulo - {{$module->name}}</h1>

<p>{{ $module->video }}</p>

@endsection
