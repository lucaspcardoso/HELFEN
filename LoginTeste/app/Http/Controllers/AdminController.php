<?php

namespace App\Http\Controllers;

use App\Models\Codigo;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Admin;
use App\Models\Categoria;
use App\Models\Servico;
use App\Models\SubCategoria;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function codAleatorio()
    {
        $cod = new Codigo();
        $caracteres = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $codigo = '';
        for ($i = 0; $i < 6; $i++) {
            $codigo .= $caracteres[rand(0, strlen($caracteres) - 1)];
        }

        $cod->codigo = $codigo;
        $cod->save();

        $cat = Categoria::take(5)->get();
        return view('home', ['codigo' => $cod->codigo, "categoria" => $cat]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index($view, $rota)
    {
        if ($view == "view") {
            $count = [
                "users" => User::where('role', 'user')->count(),
                "prof" => User::where('role', 'profissional')->count(),
                "work" => Servico::all()->count()
            ];

            switch ($rota) {
                case 'user':
                    $dados = User::where('role', 'profissional')
                        ->orWhere('role', 'user')
                        ->paginate(10);
                    $campo = "name";
                    $filtro = "Nome";
                    break;

                case 'cat':
                    $dados = Categoria::paginate(10);
                    $campo = "nm_categoria";
                    $filtro = "Categoria";
                    break;

                case 'subCat':
                    $dados = [
                        "dados" => SubCategoria::with("subCat")->paginate(10),
                        "categoria" => Categoria::all()
                    ];
                    $campo = "nm_subCat";
                    $filtro = "Sub Categoria";
                    break;

                case 'admin':
                    $dados = User::where('role', 'admin')->paginate(10);
                    $campo = "name";
                    $filtro = "Nome";
                    break;

                default:
                    $dados = User::all()->paginate(10);
                    break;
            }


            return view("admin.adminView", ["filtro" => $filtro, "dados" => $dados, "campo" => $campo, "rota" => $rota, "view" => $view, "count" => $count]);
        } elseif ($view == "register") {
            if ($rota == "cat") {
                $name = "Categoria";
            } else if ($rota == "subCat") {
                $name = "Sub Categoria";
                $dados = [
                    "categoria" => Categoria::all(),
                ];
                return view("admin.adminRegister", ["rota" => $rota, "view" => $view, "name" => $name, "dados" => $dados]);
            } else if ($rota == "admin") {
                $name = "Administrador";
            }
            return view("admin.adminRegister", ["rota" => $rota, "view" => $view, "name" => $name]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($codigo)
    {
        $correspondencia = false;
        $codExistente = Codigo::where('codigo', $codigo)->get();
        foreach ($codExistente as $key) {
            if ($key->codigo === $codigo) {
                $correspondencia = true;
                return view('admin.adminLogin');
            }
        }
        if (!$correspondencia) {
            return view('home');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        // $admin = Admin::where('email', $request->input('email'))->first();

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // O usuário foi autenticado com sucesso. Verifique a função.
            if (Auth::user()->role === 'admin') {
                return redirect('/admin/dashboard');
            } else {
                return redirect('/');
            }
        }

        return redirect('/');
    }

    public function logout()
    {
        Auth::guard('admin')->logout(); // Faça logout do administrador
        return redirect('/'); // Redirecione para a página de login do admin após o logout
    }

    public function dashboard()
    {
        return redirect('/adminHome/view/user');
    }
}
