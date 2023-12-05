<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;
use Barryvdh\DomPDF\PDF as DomPDFPDF;

class PDFController extends Controller
{
    public function gerarPDF($name)
    {
        $user = User::where("id", $name)->first();
        $data = [
            'nome' => $user->name,
            'sobre' => $user->sobre_usu,
            'descricao' => $user->desc_usu,
            'num' => $user->cell_usu,
            'email' => $user->email,

            'lingua' => $user->language,
            'formacao' => $user->formacao,
            'xp' => $user->xp,

            'logo' => base64_encode(file_get_contents(public_path('imgs/logoBranca.png'))),
        ];

        $pdf = PDF::loadView('pdf.curriculo', $data);

        return $pdf->download('curriculo.pdf');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
