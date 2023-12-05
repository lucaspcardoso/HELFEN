<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;

class EndercoController extends Controller
{
    public function buscarPorCep($cep)
    {
        $response = Http::get("https://viacep.com.br/ws/{$cep}/json/");

        if ($response->ok()) {
            $endereco = $response->json();
            return response()->json([
                'localidade' => $endereco['localidade'],
                'bairro' => $endereco['bairro'],
                'logradouro' => $endereco['logradouro'],
            ]);
        } else {
            abort(404, 'CEP não encontrado');
        }
    }
}
