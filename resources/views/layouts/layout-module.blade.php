<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/module.css') }}">
    <title>Sistema UEM - @yield('title')</title>
</head>
<body>
    <header class="header mb-3">
        <ul class="container nav d-flex flex-row justify-content-between">
            <span class="d-flex">
                @foreach ($modules as $module)
                    <li class="nav-item">
                        <a 
                            class="nav-link {{$loggedUser->module_active == $module->id ? 'active' : ''}} {{$loggedUser->module_active != $module->id ? 'cursor-desabled' : ''}}" 
                            aria-current="page" 
                            href="{{route('module.index', [$module->slug])}}"
                            title="{{ $module->name }}"
                            >
                                {{$module->name}}
                            @if($loggedUser->module_active > $module->id)
                            <i class="fas fa-check-circle" style="color:green;"></i>
                            @else
                            <i class="far fa-times-circle" style="color: red"></i>
                            @endif
                        </a>
                    </li>
                  @endforeach
            </span>
            <span>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#"aria-disabled="true">{{$loggedUser->name}}</a>
                  </li>
            </span>
          </ul>
    </header>
    
    <section class="container-fluid">
        <h1 class="text-center">@yield('title')</h1>
    </section>
    @yield('content')
    





    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('js/module.js') }}"></script>
</body>
</html>