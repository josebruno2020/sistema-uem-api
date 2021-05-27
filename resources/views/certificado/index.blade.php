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
            background-repeat: no-repeat;
            background-size: 100%;
        }
        .linha1 {
            padding: 50px;
        }
        .logo-img {
            width: 150px;
        }

        .title {
            margin: auto;
            font-size: 70px;
        }

    </style>
</head>
<body>
    <main style="background-image: url({{asset('images/maringa.jpg')}})">
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
            
        </header>
        
    </main>
    
</body>
</html>