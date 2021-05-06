@extends('layouts.layout-module')

@section('title', $module->name)

@section('content')

<main class="container-fluid mt-3">

<div class="d-flex justify-content-center mt-4">
    {!! $module->video !!}
</div>

<div class="form-group d-flex justify-content-center mt-5">
    <a href="{{ route('module.questions', [$module->id]) }}"  class="btn  button-blue" title="Responder Formulário">Responder formulário</a> 
</div>

@endsection
