<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function home()
    {
        $cat = Categoria::take(5)->get();
        return view('home', ['categoria' => $cat]);
    }
}
