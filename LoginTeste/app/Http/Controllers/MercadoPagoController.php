<?php
namespace App\Http\Controllers;

use App\Models\Servico;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use MercadoPago\Item;
use MercadoPago\MerchantOrder;
use MercadoPago\Payer;
use MercadoPago\Preference;
use MercadoPago\SDK;
use Illuminate\Support\Facades\DB;

class MercadoPagoController extends Controller
{

    public function __construct()
    {
        SDK::setAccessToken(config('mercadoPago.acess_token'));
    }

    public function index($nameWork)
    {
        $works = Servico::where('id', $nameWork)->first();
        return view('payment.viewService', ['works' => $works]);
    }

    public function pagar($nameWork)
    {

        $works = Servico::where('id', $nameWork)->first();

        $preference = new Preference();
        $item = new Item();
        $item->title = $works->name_work;
        $item->currency_id = "BRL";
        $item->description = $works->descr_work;
        $item->quantity = 1;
        if ($works->desconto_work) {
            $item->unit_price = $works->price_work - ($works->price_work * $works->desconto_work) / 100;
        } else {
            $item->unit_price = $works->price_work;
        }

        $preference->items = [$item];
        $preference->back_urls = [
            "success" => "127.0.0.1:8000/retorno-pagamento?name=" . $nameWork . "&",
        ];
        $preference->save();

        return redirect()->to($preference->init_point);
    }

    public function retornoPagamento(Request $request)
    {
        $nameWork = $request->input("name");
        $work = Servico::where("id", $nameWork)->first();

        return view('payment.retorno_pagamento', [
            'status' => $request->input('status'),
            'id' => $request->input('payment_id'),
            "work" => $work,
        ]);
    }


}
