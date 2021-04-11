@extends('layouts.layout-module')

@section('title', $module->name)

@section('content')

<main class="container-fluid mt-3">

<div class="d-flex justify-content-center mt-4">
    {!! $module->video !!}
</div>


@endsection
