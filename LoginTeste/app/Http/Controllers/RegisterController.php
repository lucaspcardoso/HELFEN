<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\Profissional;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    public function registerP()
    {
        return view('auth.register-professional');
    }

    public function store(Request $request)
    {
        $existingUser = User::where('email', $request->email)->first();

        if ($existingUser) {
            return redirect()->back()->withErrors(['email' => 'Este e-mail já está sendo usado por outro usuário.']);
        }

        // Validação dos dados
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'cep_end_usu' => 'nullable|string|max:9',
            'rua_end_usu' => 'required|string|max:255',
            'bairro_end_usu' => 'required|string|max:255',
            'num_end_usu' => 'required|integer',
            'cdd_end_usu' => 'required|string|max:255',
            'cell_usu' => 'required|string|max:255',
            'dt_nasc_usu' => 'required',
            'genero_usu' => 'required|string|max:255',
        ]);



        //tirando as mascaras
        $cep = $validatedData['cep_end_usu'];
        $cep = str_replace(['-', '.', ',', '_'], '', $cep);

        $tel = $validatedData['cell_usu'];
        $tel = str_replace(['(', ')', ' ', '-'], '', $tel);

        // Criação do usuário
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['password']);
        $user->cep_end_usu = $cep;
        $user->rua_end_usu = $validatedData['rua_end_usu'];
        $user->bairro_end_usu = $validatedData['bairro_end_usu'];
        $user->num_end_usu = $validatedData['num_end_usu'];
        $user->cdd_end_usu = $validatedData['cdd_end_usu'];
        $user->cell_usu = $tel;
        $user->dt_nasc_usu = $validatedData['dt_nasc_usu'];
        $user->sexo_usu = $validatedData['genero_usu'];
        $user->role = "user";

        $user->save();

        Auth::login($user);

        return redirect()->route('dashboard'); // Redireciona para a página de dashboard após o registro
    }

    public function storeP(Request $request)
    {
        $prof = new User();

        $cep = $prof->cep_end_usu = $request->cep_end_prof;
        $cep = str_replace(['-', '.', ',', '_'], '', $cep);

        $tel = $prof->cell_usu = $request->cel_prof;
        $tel = str_replace(['(', ')', ' ', '-'], '', $tel);

        $prof->name = $request->nm_prof;
        $prof->email = $request->email;
        $prof->password = $request->password;
        $prof->cep_end_usu = $cep;
        $prof->rua_end_usu = $request->rua_end_prof;
        $prof->bairro_end_usu = $request->bairro_end_prof;
        $prof->num_end_usu = $request->num_end_prof;
        $prof->cdd_end_usu = $request->cdd_end_prof;
        $prof->dt_nasc_usu = $request->dt_nasc_prof;
        $prof->cell_usu = $tel;
        $prof->sexo_usu = $request->genero_prof;
        $prof->role = "profissional";

        $cnpj = $request->cpf_prof;
        $cleanedValue = preg_replace('/[^0-9]/', '', $cnpj);

        if (strlen($cleanedValue) === 11) {
            $cpf = $cleanedValue;
            $prof->cpf_usu = $cpf;
        } elseif (strlen($cleanedValue) === 14) {
            $cnpj = $cleanedValue;
            $prof->cnpj_usu = $cnpj;
        }


        $prof->save();
        Auth::login($prof);
        return redirect()->route('dashboard');
    }
}
