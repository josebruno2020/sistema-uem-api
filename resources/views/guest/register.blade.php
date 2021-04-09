@extends('layouts.layout-guest')

@section('title', 'Cadastro')

@section('content')

@section('img')
{{asset('images/doctor-register.png')}}
@endsection
@section('img-class', 'doctor-register')

<h1 class="text-center">Faça o seu cadastro e participe!</h1>
{{-- @include('components.errors') --}}
<form action="" method="post" class="form mt-4">
    @csrf
    <div class="form-group">
        <label for="name" class="form-label">Nome:</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" autofocus="true" value="{{ old('name') }}">
        <div id="name-error" class="form-text text-danger">
            @error('name')
                {{$errors->first('name')}}
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label for="phone" class="form-label">Telefone:</label>
        <input type="text" class="form-control phone @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{ old('phone') }}">
        <div id="phone-error" class="form-text text-danger">
            @error('phone')
                {{$errors->first('phone')}}
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label for="email" class="form-label">E-mail:</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}">
        <div id="email-error" class="form-text text-danger">
            @error('email')
                {{$errors->first('email')}}
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label for="password" class="form-label">Senha:</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
        <div id="password-error" class="form-text text-danger">
            @error('password')
                {{$errors->first('password')}}
            @enderror
        </div>
    </div>
    
    <div class="form-group">
        <label for="password" class="form-label">Confirme sua Senha:</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" id="password_confirmation">
        <div id="password_confirmation_error" class="form-text text-danger">
            @error('password')
                {{$errors->first('password')}}
            @enderror
        </div>
    </div>
    

    <div class="form-group d-flex justify-content-center mt-5">
        <input type="submit" class="btn  button-blue" value="Registrar-se">
    </div>
</form>
    

@endsection