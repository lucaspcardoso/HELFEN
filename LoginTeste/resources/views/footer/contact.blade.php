@extends('layouts\layoutSite') @section('info')
    <title>Termos de Serviço / Helfen</title>
    <div class="containerContact">
        <div>
            <h1 class="arimo">Contato - Helfen.</h1>
            <div class="containerContactIcons">
                <span>
                    <a href="mailto:helfenopendoors@outlook.com">
                        <img src="{{ asset('imgs/envelope-open-fill.svg') }}" alt="" class="icon">
                        helfenopendoors@outlook.com
                    </a>
                </span>

                <span>
                    <a href="mailto:helfenopendoors@gmail.com">
                        <img src="{{ asset('imgs/envelope-open-fill.svg') }}" alt="" class="icon">
                        helfenopendoors@gmail.com
                    </a>
                </span>

                <span>
                    <img src="{{ asset('imgs/svg/telephone-fill.svg') }}" alt="" class="icon">
                    +55 (19) 984540719
                </span>
            </div>
        </div>
    </div>
@endsection
