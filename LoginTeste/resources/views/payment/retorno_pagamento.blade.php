<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/retornoPagamento.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    @if ($status == 'approved')
        <title>Pagamento Aprovado</title>
    @endif

</head>

<body>
    <main>
        <div class="containerAprovade">
            <div class="containerInfoAprovade">
                <img src="{{ asset('imgs/logoBranca.png') }}" alt="" class="logoStyle">
                <p>Pedido nº: {{ $id }}</p>
            </div>
            <div class="containerTitles">
                @if ($status == 'approved')
                    <p class="pagAprovado">Pagamento Aprovado</p>
                @endif
                <p class="textBranco">Seu pedido já foi agendado com o profissional.</p>
            </div>

            <div class="progress">
                <div class="containerCheck">
                    <img src="{{ asset('imgs/check-mark.png') }}" alt="" class="imageCheck">
                    <span>Pedido Realizado</span>
                </div>

                <div class="containerCheck">
                    <img src="{{ asset('imgs/check-mark.png') }}" alt="" class="imageCheck">
                    <span>Pagameto Aprovado</span>
                </div>

                <div class="containerCheckWhite">
                    <img src="{{ asset('imgs/check-mark.png') }}" alt="" class="imageCheck">
                    <span>Pedido Solicitado</span>
                </div>
            </div>
        </div>

        <div class="margin">
            <div class="containerMargin">
                <p>Olá, <strong>{{ $work->user->name }}</strong>.</p>
                <p class="text">Seu pagamento foi aprovado. Confira os detalhes abaixo.</p>
            </div>

            <p class="product">Produto</p>

            <div class="containerProduct">
                <p class="bold">{{ $work->name_work }}</p>
                <p class="text">{{ $work->descr_work }}</p>
            </div>

            <div class="containerDescricaoProduto ">
                <div class="rating-container containerAvaliacao">
                    <h3>Avalie o serviço fornecido pelo usuário.</h3>
                    <span class="text">Avaliação:</span>

                    <form action="/avaliacao/env/{{ $work->user->id }}" method="post" id="rating-form">
                        @method('put')
                        @csrf
                        <div class="rating-stars" id="rating-stars">
                            <span class="star" data-value="1">&#9733;</span>
                            <span class="star" data-value="2">&#9733;</span>
                            <span class="star" data-value="3">&#9733;</span>
                            <span class="star" data-value="4">&#9733;</span>
                            <span class="star" data-value="5">&#9733;</span>
                        </div>
                        <input type="hidden" name="rating" id="rating-input" value="0">
                        <div>
                            <button type="submit" class="btnEnviar">Enviar Avaliação</button>
                        </div>
                    </form>
                    <p id="rating-value" class="none">Sua avaliação: <span id="selected-rating">0</span></p>
                </div>

                <div class="infoProduct">
                    <span class="bold tCenter">Informações do produto: </span>
                    <div class="containerColunas">
                        <div class="coluna">
                            <div class="bold">Descontos:</div>
                            <div class="bold">Total:</div>
                        </div>

                        <div class="coluna">
                            <div>
                                R${{ preg_replace('/[^0-9]/', ',', number_format(($work->price_work * $work->desconto_work) / 100, 2)) }}
                            </div>
                            <div class="tgreen bold">
                                R${{ preg_replace(
                                    '/[^0-9]/',
                                    ',',
                                    number_format($work->price_work - ($work->price_work * $work->desconto_work) / 100, 2),
                                ) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

<script src="{{ asset('js/retornoPagamento.js') }}"></script>

</html>
