@extends('layouts.layout-module')

@section('title', 'Questionário Preparatório')

@section('content')

<main class="container mt-3">
    <form action="{{route('module.evaluate.questions', [$module->id])}}" method="post">
        @csrf
            @foreach ($module->questions as $question)
            <div class="form-group mb-3">
                {{-- Enunciado --}}
                <h4>Pergunta {{$question->number}}:</h4>
                <p class="question">{{$question->question}}</p>


                @foreach ($question->answers as $answer)
                    {{-- Alternativas --}}
                    <div class="form-check">
                        <input 
                            class="form-check-input" 
                            type="radio" 
                            name="answer[{{$question->id}}]" 
                            value="{{ $answer->number }}"
                            id="{{$question->number}}{{$answer->number}}"
                            required
                        >
                        <label class="form-check-label" for="{{$question->number}}{{$answer->number}}">
                            {{$answer->answer}}
                        </label>
                    </div>
                @endforeach
            </div>
            @endforeach

        <div class="form-group d-flex justify-content-center mt-5">
            <input type="submit" class="btn  button-blue" value="Responder" onclick="return confirm('Tem certeza que deseja responder o formulário?');">
        </div>
    
    </form>
</main>


@endsection