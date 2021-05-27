<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificado de Participação - Reanima UEM</title>

    <style>
        @page {
            margin: 0;
            padding:0;
        }
        body {
            margin: 0;
            padding:0;
        }

        main {
            padding: 0 50px 0 50px;
            background-repeat: no-repeat;
            background-size: 100%;
            padding-bottom:70px;
            
        }

        /* .blur {
            backdrop-filter: grayscale(0.5) opacity(0.9) blur(2px);
            padding: 0 50px 0 50px;
        } */
        .linha1 {
            padding: 50px;
        }
        .logo-img {
            width: 200px;
        }

        .title {
            
            font-size: 70px;
        }

        .texto {
            margin-top:50px;
        }

        .paragrafo {
            text-align: justify;
            font-size: 30px;
        }

        .data {
            margin-top: 50px;
            font-size: 30px;
        }

        .footer {
            margin-top: 50px;
            padding: 0 50px 0 50px;
        }
    </style>
</head>
<body>
    <main style="background-image: url({{asset('images/maringa.png')}})">
        
        <header class="header">
            <table style="margin: auto">
                <tr class="linha1">
                    <th >
                        <img src="{{ asset('images/uem.png') }}" alt="Logo UEM" class="logo-img">
                    </th>
                    <th style="padding: 0 100px 0 100px;">
                        <h1 class="title">Certificado</h1>
                    </th>
                    <th>
                        <img src="{{ asset('images/profurg.png') }}" alt="Logo PROFURG" class="logo-img">
                    </th>
                </tr>
            </table>

            <div class="texto">
                <p class="paragrafo">
                    Certificamos que <strong>{{$user->name}}</strong> participou do VIII Congresso Sulbrasileiro de Fisioterapia Cardiorrespiratória e Fisioterapia em Terapia Intensiva realizado entre os dias 29 e 31 de Outubro de 2015, na cidade de Florianópolis –SC, com carga horária total de 20 horas na qualidade de OUVINTE.</p>
                <p class="data">
                    Maringá, {{date('d')}} de {{$month}} de {{date('Y')}}.
                </p>
            </div>
        </header>
        
        
    </main>

    <div class="footer">
        <table style="margin: auto">
            <tr class="linha1">
                <th >
                    Assinatura 1
                </th>
                <th style="padding: 0 100px 0 100px;">
                    Assinatura 1
                </th>
                <th>
                    Assinatura 1
                </th>
            </tr>
        </table>
    </div>
    
</body>
</html>