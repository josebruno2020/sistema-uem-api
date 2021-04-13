@extends('layouts.layout-module')

@section('title', 'Questionário Preparatório')

@section('content')

<main class="container mt-3">
    <form action="{{route('module.preparatory.post')}}" method="post">
        @csrf
        <div class="form-group">
            {{-- Enunciado --}}
            <h4>Pergunta 1:</h4>
            <p class="question">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a lectus gravida, tristique lacus eget, convallis nibh. Etiam tellus nisi, rhoncus ut ante vitae, faucibus tincidunt ex. Duis nec neque feugiat, porta erat malesuada, porta ligula. Vivamus dapibus dolor eget urna mollis aliquet id nec lorem. Fusce bibendum quam at tellus tincidunt lobortis. Quisque cursus, orci in elementum lacinia, metus sapien venenatis quam, sit amet suscipit augue justo eu quam.</p>
            
            {{-- Alternativas --}}
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                    Alternativa 1
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                    Alternativa 2
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                    Alternativa 3
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                    Alternativa 4
                </label>
            </div>
            
        </div>

        <div class="form-group d-flex justify-content-center mt-5">
            <input type="submit" class="btn  button-blue" value="Responder" onclick="return confirm('Tem certeza que deseja responder o formulário?');">
        </div>
    
    </form>
</main>


@endsection