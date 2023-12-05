<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Curriculo - {{ $nome }}</title>
    <style>
        * {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: #76CAD4;
            color: white;
            padding: 25px 70px;
        }

        .number,
        .email {
            margin-top: 8px;
        }

        .containerAll {
            margin-left: 70px;
            margin-right: 70px;
        }

        .title {
            text-transform: uppercase;
            padding: 10px 0px;
        }


        .object {
            margin-top: 50px;
            margin-bottom: 50px;
        }

        .object p {
            line-break: anywhere;
        }

        .containerLingua,
        .formacao,
        .xp {
            margin-top: 50px;
        }

        .titleFormacao {
            font-weight: bold;
        }

        .textPlus {
            font-size: 1.2rem;
        }

        .logo {
            height: 170px;
            position: absolute;
            left: 450;
            top: 0;
        }

        .descricao {
            max-width: 500px;
        }
    </style>
</head>

<body>
    <main>

        <header class="header">
            <h1 class="title">{{ $nome }}</h1>
            <p class="descricao">{{ $descricao }}</p>

            <div class="rowInfo">
                <div class="number">{{ $num }}</div>
                <div class="email">{{ $email }}</div>

                <img src="data:image/jpeg;base64,{{ $logo }}" alt="" class="logo" />
        </header>


        <div class="containerAll">
            <div class="object">
                <h2>Sobre</h2>
                <p>
                    {{ $sobre }}
                </p>
            </div>

            <div class="containerLingua">
                <h2>Línguas</h2>

                @foreach ($lingua as $ln)
                <div>
                    <p>
                        @if ($ln->name_lingua == 'en')
                        Inglês
                        @elseif ($ln->name_lingua == 'es')
                        Espanhol
                        @elseif ($ln->name_lingua == 'ale')
                        Alemão
                        @elseif ($ln->name_lingua == 'fr')
                        Francês
                        @elseif ($ln->name_lingua == 'it')
                        Italiano
                        @endif
                        -
                        @if ($ln->nivel_lingua == 1)
                        Nível Baixo
                        @elseif ($ln->nivel_lingua == 2)
                        Nível Intermediário
                        @elseif ($ln->nivel_lingua == 3)
                        Fluente
                        @endif

                    </p>
                </div>
                @endforeach

            </div>

            <div class="formacao">
                <h2>Cursos e Formação</h2>
                @foreach ($formacao as $form)
                <div>
                    @if (!empty($form->nm_curso_form))
                    <h3 class="title">Curso {{ $form->nm_curso_form }} </h3>
                    @else
                    <h3 class="title">Universidade {{ $form->nm_curso_form }} </h3>
                    @endif
                    <p class="font-distance" data-descricao="{{ $form->desc_curso }}">
                        {{ $form->desc_curso }}</p>
                </div>
                @endforeach

            </div>

            <div class="xp">
                <h2>Experiências</h2>
                @foreach ($xp as $xp)
                <div>
                    <h3 class="title">{{ $xp->anoInicial }}-{{ $xp->anoFinal }} | {{ $xp->nm_empresa_trab }}
                    </h3>
                    <p class="textPlus">{{ $xp->cargo_empre_trab }}</p>
                    <p>
                        {{ $xp->desc_trab }}
                    </p>
                </div>
                @endforeach

            </div>
        </div>
    </main>
</body>

</html>
