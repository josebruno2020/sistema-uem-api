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
            padding: 0;
        }

        body {
            margin: 0;
            padding: 0;
        }

        main {
            margin: 0;
            padding: 0 50px 20px 50px;
            background-repeat: no-repeat;
        }

        .linha1 {
            padding: 50px;
        }

        .logo-img {
            width: 200px;
        }

        .ass-img {
            width: 200px;
        }

        .title {
            font-size: 70px;
        }

        .texto {
            margin-top: 15px;
        }

        .paragrafo {
            text-align: justify;
            font-size: 25px;
        }

        .texto-pequeno {
            margin-top: 20px;
            text-align: justify;
            font-size: 16px;
        }

        .user {
            width: 100%;
            text-align: center;
            font-size: 30px;
            font-weight: bold;
        }

        .data {
            margin-top: 50px;
            font-size: 20px;
        }

        .footer {
            margin-top: 10px;
        }
    </style>
</head>
<body>
<main style="background-image: url({{asset('images/maringa.png')}})">

    <header class="header">
        <table style="margin: auto">
            <tr class="linha1">
                <th>
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
    <section>

    </section>
    <div class="texto">
        <p class="paragrafo">
            A Universidade Estadual de Maringá com o Programa de Mestrado Profissional em Gestão, Tecnologia e Inovação
            em Urgência e Emergência – PROFURG, certifica que o aluno</p>
        <p class="user">{{ $name }}</p>
        <p class="paragrafo"> concluiu o curso de <strong>"Ventilação Mecânica Básica"</strong> na categoria de
            atualização profissional, com carga horária de 20 horas/aula.
        </p>
        <p class="texto-pequeno">
            A certificação não habilita o concluinte a realizar procedimentos que não estejam regulamentados em sua
            respectiva profissão.
        </p>
        <p class="data">
            Maringá, {{date('d')}} de {{$month}} de {{date('Y')}}.
        </p>
    </div>


</main>
<div class="footer">
    <table style="margin: auto">
        <tr class="linha1">
            <th>
                <div>
                    <img src="{{ asset('images/assinatura.png') }}" alt="DIANA CAROLINA SALCEDO GARAY" class="ass-img">
                </div>
                <p>
                    DIANA CAROLINA SALCEDO GARAY
                </p>

            </th>
            <th style="padding: 0 100px 0 100px;">
                Assinatura 2
            </th>
        </tr>
    </table>
</div>


</body>
</html>
