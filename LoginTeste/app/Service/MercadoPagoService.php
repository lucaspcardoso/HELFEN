<?php

namespace App\Services;

use MercadoPago\Item;
use MercadoPago\Preference;
use MercadoPago\SDK;

class MercadoPagoService
{

    public function __construct()
    {
        SDK::setAccessToken('mercadopago.acess_token');
    }
    public function criarPreferencia()
    {
        $preference = new Preference();

        $item = new Item();
        $item->title = 'Meu Produto';
        $item->quantity = 1;
        $item->unit_price = 10.2;
        $preference->items = array($item);
        $preference->save();

        dd($preference);
    }

    public function pegarPreferencia()
    {
    }
}
