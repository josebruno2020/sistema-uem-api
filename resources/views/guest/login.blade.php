@extends('layouts.layout-guest')

@section('title', 'Cadastro')

@section('content')

@section('img')
{{asset('images/doctor-register.png')}}
@endsection
@section('img-class', 'doctor-register')

<h1 class="text-center">Login</h1>
{{-- @include('components.errors') --}}
<form action="{{route('login.post')}}" method="post" class="form mt-4">
    @csrf
    <div class="form-group">
        <label for="email" class="form-label">E-mail:</label>
        <input autofocus type="email" class="form-control {{$flash ? 'is-invalid' : ''}} " name="email" id="email" value="{{ old('email') }}" required>
        <div id="email-error" class="form-text text-danger">
            @if($flash && !empty($flash))
                {{$flash}}
            @endif
        </div>
    </div>
    <div class="form-group">
        <label for="password" class="form-label">Senha:</label>
        <input type="password" class="form-control {{$flash ? 'is-invalid' : ''}} " name="password" id="password" required>
        
    </div>

    <div class="form-group">
        <p>Ainda não tem registro? <a href="{{ route('register.index') }}">Registre-se</a></p>
    </div>

    <div class="form-group d-flex justify-content-center mt-5">
        <input type="submit" class="btn  button-blue" value="Fazer Login">
    </div>
</form>
    

@endsection