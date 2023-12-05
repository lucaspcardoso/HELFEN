<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/homeStyle.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/carousel.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Home / Helfen</title>
</head>

<body>
    <nav class="navbar">
        <div class="container">
            <div class="flex-start">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('imgs/3-semfundo.png') }}" alt="Helfen" class="image" /><span
                        class="bebas title">Helfen</span>
                </a>
            </div>

            <div class="flex-end">
                <div class="search-container">
                    <form action="/search" method="get">
                        <input class="search expandright" id="searchright" type="search" name="search"
                            placeholder="Pesquisa" />
                        <label class="expand-button searchbutton" for="searchright"><span
                                class="mglass material-symbols-outlined">search</span></label>
                    </form>
                </div>

                @guest
                    <div class="flex-center">
                        <a href="/login" class="buttom-login">Login</a>
                    </div>
                    @endguest @auth
                    @if (auth()->user()->role == 'admin')
                        <div class="flex-center">
                            <a href="/admin/dashboard" class="buttom-login">Entrar</a>
                        </div>
                    @else
                        <div class="flex-center">
                            <a href="/login" class="buttom-login">Entrar</a>
                        </div>
                    @endif

                @endauth
            </div>
        </div>
    </nav>

    <div class="banner">
        <div class="block-text ms-5">
            <h2 class="title-block-text bebas">
                Abra novas portas para sua carreira.
            </h2>
            <p class="assistant subtitle">
                Deixe-nos ajudá-lo a encontrar o caminho para o sucesso
                profissional. Aqui, você pode se conectar com as melhores
                empresas e descobrir oportunidades incríveis para sua
                carreira decolar. Não perca mais tempo - comece hoje mesmo a
                transformar seu futuro com nossa ajuda.
            </p>

            <div class="container-buttom-Register">
                <a href="/register" class="aleo buttom-register">Cadastre-se Já</a>

                <a href="/registerp" class="aleo buttom-registerP">Cadastre-se como Profissional</a>
            </div>
        </div>
    </div>

    <div class="carrossel-section">
        <div class=" mt-5">
            <div>
                <h1 class="title-block-text bebas title-carousel">
                    Principais Serviços
                </h1>
                <p class="subtitle-carrosel">
                    Os serviços mais utilizados de cada categoria.
                </p>
            </div>

            <div class="margin-carrosel">
                <div class="carousel">
                    <div class="cards-container">
                        @foreach ($categoria as $cat)
                            <div class="card">
                                @if ($cat->img)
                                    <img src="{{ $cat->img }}" alt="Card 1" />
                                @endif

                                <h2>{{ $cat->nm_categoria }}</h2>
                                <a href="/login" class="link-carousel">Solicitar Serviço</a>
                            </div>
                        @endforeach

                    </div>
                    <div class="arrow arrow-left"><i class="bi bi-caret-left-fill"></i></div>
                    <div class="arrow arrow-right"><i class="bi bi-caret-right-fill"></i></div>
                </div>
            </div>
        </div>
    </div>

    <div class="what-is-helfen-container">
        <div class="what-is-helfen-margin">
            <div class="img-container">
                <img src="{{ asset('imgs/vikingloiro-helfen (1).png') }}" alt="" class="what-is-helfen-img" />
            </div>
            <div class="what-is-helfen">
                <h1 class="title-block-text bebas mt-5">
                    O que é o HELFEN
                </h1>
                <p class="assistant subtitle">
                    Olá, eu sou o Harald! Estou aqui para te apresentar o Helfen!
                    Uma plataforma com objetivo de trazer facilidade e funcionalidade aos profissionais, permitindo que
                    estabeleçam conexões em suas respectivas áreas de atuação.
                </p>

                <div>
                    <h5 class="mb-5">Propostas do Helfen: </h5>

                    <section class="what-is-helfen-section">

                        <div class="suiticase">
                            <img src="{{ asset('imgs/svg/suitcase.svg') }}">

                            <h4 class="arimo">Mudança de Abordagem</h4>
                            <p class="arimo">Mudança na abordagem da busca por emprego.</p>
                        </div>

                        <div class="network">
                            <img src="{{ asset('imgs/svg/network.svg') }}">

                            <h4 class="arimo">NetWork</h4>
                            <p class="arimo">Expansão da rede de contatos e horizontes profissionais.</p>
                        </div>

                        <div class="global">
                            <img src="{{ asset('imgs/svg/global.svg') }}">

                            <h4 class="arimo">Acesso Global</h4>
                            <p class="arimo">O Helfen oferece seus serviços de forma independente da localização,
                                garantindo a disponibilidade contínua de seus recursos e assistência em todo momento.
                            </p>
                        </div>

                        <div class="idea">
                            <img src="{{ asset('imgs/svg/idea.svg') }}">

                            <h4 class="arimo">Variedade de oportunidades</h4>
                            <p class="arimo">No site Helfen, encontre uma ampla diversidade de oportunidades em
                                diversos setores e posições.</p>
                        </div>

                    </section>
                </div>
            </div>
        </div>

        <div class="containerDevs">
            <h1>Desenvolvedores:</h1>
            <div class="containerRowDevs">
                <div class="cardDev">
                    <img src="{{ asset('imgs/laura.jpeg') }}" alt="" class="imageDevs">
                    <h3>Laura</h3>
                    <p>Banco de Dados</p>
                </div>

                <div class="cardDev">
                    <img src="{{ asset('imgs/leticia.png') }}" alt="" class="imageDevs">
                    <h3>Letícia</h3>
                    <p>Design e Diário de Bordo</p>
                </div>

                <div class="cardDev">
                    <img src="{{ asset('imgs/lucas.jpeg') }}" alt="" class="imageDevs">
                    <h3>Lucas</h3>
                    <p>Front-end, Back-end e Design</p>
                </div>

                <div class="cardDev">
                    <img src="{{ asset('imgs/mary.jpeg') }}" alt="" class="imageDevs">
                    <h3>Marielle</h3>
                    <p>Design e Documentação</p>

                </div>

            </div>
        </div>

        <footer>
            <div class="container-footer ms-5 me-5">
                <div class="container-footer-img">
                    <div>
                        <a href="#">
                            <img src="{{ asset('imgs/3-semfundo.png') }}" alt="" class="image" />
                        </a>
                        <span class="bebas subtitle">Helfen</span>
                    </div>

                    <div>
                        <select name="idiome" id="language" class="language assistant">
                            <option value="pt" selected>Português</option>
                            <option value="en">English</option>
                        </select>
                    </div>
                </div>

                <div>
                    <p>
                        © 2023-
                        <?= date('Y') ?>
                        | Todos os direitos reservados.
                    </p>
                </div>
            </div>

            <div class="container-question">
                <div class="why-my">
                    <h4 class="assistant blue">Quem somos?</h4>
                    <a href="#">Sobre nós.</a>
                    <a href="/contact">Contato.</a>
                    <a href="#">Políticas do Helfen.</a>
                    <a href="#">Políticas de privacidade.</a>
                    <a href="/termoServico">Termos de serviço.</a>
                    <a href="#">Configurações de cookies.</a>
                </div>

                <div class="forget-job">
                    <h4 class="assistant blue">Encontre Trabalho.</h4>
                    <a href="#">TI e Programação.</a>
                    <a href="#">Design e Multimidia.</a>
                    <a href="#">Tradução e Conteúdos.</a>
                    <a href="#">Marketing e Vendas.</a>
                    <a href="#">Jurídico.</a>
                    <a href="#">Finanças e Administração.</a>
                    <a href="#">Engenharia e Manufatura.</a>
                </div>

                <div class="social-midia">
                    <h4 class="assistant blue">Redes Sociais.</h4>
                    <div class="social-midia-circle">
                        <div><i class="bi bi-instagram"></i></div>
                        <div><i class="bi bi-facebook"></i></div>
                        <div><i class="bi bi-linkedin"></i></div>
                        <div><i class="bi bi-youtube"></i></div>
                        <div><i class="bi bi-twitter"></i></div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

    @if (!empty($codigo))
        <script>
            console.log("{{ $codigo }}");
        </script>
    @endif
    <script src="{{ asset('js/carouselHome.js') }}"></script>
    <script src="{{ asset('js/carroselJS.js') }}"></script>
</body>

</html>
