@extends('guest.layout')

@section('title', 'Cadastro')

@section('content')
<section class="container-fluid d-flex justify-content-around flex-wrap">
    <section class="d-flex align-items-center justify-content-center">
        <img src="{{asset('images/doctor-register.png')}}" alt="Registrar" class="doctor-register">
    </section>
    <section class="d-flex flex-column justify-content-center">
        <h1 class="text-center">Faça o seu cadastro e participe!</h1>
        @include('components.errors')
        <form action="" method="post" class="form mt-4">
            @csrf
            <div class="form-group">
                <label for="name" class="form-label">Nome:</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" autofocus="true" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label for="phone" class="form-label">Telefone:</label>
                <input type="text" class="form-control phone @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{ old('phone') }}">
            </div>
            <div class="form-group">
                <label for="email" class="form-label">E-mail:</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Senha:</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Confirme sua Senha:</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" id="password">
            </div>

            <div class="form-group d-flex justify-content-center mt-5">
                <input type="submit" class="btn  button-blue" value="Registrar-se">
            </div>
        </form>
    </section>
    
</section>
@endsection