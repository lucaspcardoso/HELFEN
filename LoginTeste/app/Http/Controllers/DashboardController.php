<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Profissional;
use App\Models\Servico;
use App\Models\SubCategoria;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{

    public function index()
    {
        $categoria = Categoria::all();
        return view('categoria', ['categoria' => $categoria]);
    }

    public function dashboard()
    {
        $services = Servico::all();
        return view('dashboard', ['services' => $services]);
    }
}
