<div class="cards">

    <div class="container-img-cards">
        <img src="{{ asset('imgs/sung.jpeg') }}" alt="">
        <span>
            <p class="strong">Cleison da Silva</p>
            <div>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star"></i>
                <i class="bi bi-star"></i>
            </div>
        </span>
    </div>

    <?php
    $desconto = '50%';
    $desc = true;
    ?>



    <div class="content-card">
        @if ($desc)
            <div class="desc">
                <img class="desc-img" src="{{ asset('imgs/svg/desconto.svg') }}" alt="">
                <p class="desc-text arimo">{{ $desconto }} sale</p>
            </div>
        @endif
        <p class="defalt">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
            incididunt ut
            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
            laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
            voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
    </div>

    <div class="content-imgs">
        <img src="{{ asset('imgs/logo.png') }}" alt="">
        <img src="{{ asset('imgs/logo.png') }}" alt="">
        <img src="{{ asset('imgs/logo.png') }}" alt="">
    </div>
</div>
