@extends('layouts.layout-guest')

@section('title', 'Seja Bem-vindo!')

@section('img')
{{ asset('images/doctor-welcome.png') }}
@endsection
@section('img-class', 'doctor-welcome')

@section('content')
<h1 class="text-center">Seja Bem-vindo!</h1>
<p class="text-welcome mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam, quae! Inventore consequatur deserunt hic quaerat animi, commodi fuga quam, eos quidem corporis voluptates eum voluptatem. Quasi rerum consectetur dolor expedita.</p>
<p class="text-welcome">
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa saepe, praesentium, porro error veniam commodi placeat voluptates repudiandae odio adipisci facere quidem cupiditate iste impedit, aliquid quo veritatis modi eligendi!
</p> 

<div class="d-flex justify-content-center mt-5">
    <a href="{{ route('register.index') }}" class="btn  button-blue">Começar</a>
</div>
@endsection