<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Formacao;
use App\Models\Language;
use App\Models\Servico;
use App\Models\User;
use Illuminate\Http\Request;
use Cloudinary\Cloudinary;
use Illuminate\Routing\Controller;

class userAction extends Controller
{

    protected $cloudinary;

    public function __construct()
    {
        $this->cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                'api_key' => env('CLOUDINARY_API_KEY'),
                'api_secret' => env('CLOUDINARY_API_SECRET'),
            ],
        ]);
    }

    public function index($tipo)
    {
        // Obtenha os dados necessários com base no tipo de atualização

        switch ($tipo) {
            case 'infos-basic':
                $tipo = "Editar Informações Básicas";
                $dados = [
                    "Foto de Perfil" => auth()->user()->profile_photo_path,
                    "Nome" => auth()->user()->name,
                    "Data de Nascimento" => auth()->user()->dt_nasc_usu,
                    "Sexo" => auth()->user()->sexo_usu,
                ];


                if (auth()->user()->cnpj_usu != 0) {
                    $dados['CNPJ'] = auth()->user()->cnpj_usu;
                }
                if (auth()->user()->cpf_usu != 0) {
                    $dados['CPF'] = auth()->user()->cpf_usu;
                }
                break;

            case 'infos-end':
                $tipo = "Editar Endereço";
                $dados = [
                    "CEP" => auth()->user()->cep_end_usu,
                    "Rua" => auth()->user()->rua_end_usu,
                    "Bairro" => auth()->user()->bairro_end_usu,
                    "Cidade" => auth()->user()->cdd_end_usu,
                    "Número" => auth()->user()->num_end_usu
                ];
                break;

            case 'infos-contact':
                $tipo = "Editar Informações de Contato";
                $dados = [
                    "E-mail" => auth()->user()->email,
                    "Telefone/Celular" => auth()->user()->cell_usu
                ];
                break;

            case 'update-pass':
                $tipo = "Atualizar Senha";
                $dados = [
                    "Senha" => "",
                    "Confirmar Senha" => ""
                ];
                break;

            default:
                $dados = null;
                break;
        }

        return view('profile.edit', compact('tipo', 'dados'));
    }

    public function update(Request $request, $id, $tipo)
    {
        $user = User::findOrFail($id);

        switch ($tipo) {
            case 'Editar Informações Básicas':
                $photo = $request->inputPhoto;
                $upload = $this->cloudinary->uploadApi()->upload($photo->getRealPath());
                $url = $upload['url'];
                $user->profile_photo_path = $url;
                $user->name = $request->input('Nome');
                $user->sexo_usu = $request->input('genero_usu');
                $user->dt_nasc_usu = $request->input('dt_nasc_usu');
                if ($request->inCPF) {
                    $user->cpf_usu = $request->inCPF;
                } else if ($request->inCNPJ) {
                    $user->cpf_usu = $request->inCNPJ;
                }
                break;

            case 'Editar Endereço':
                $user->cep_end_usu = $request->input('cep');
                $user->rua_end_usu = $request->input('Rua');
                $user->bairro_end_usu = $request->input('Bairro');
                $user->cdd_end_usu = $request->input('Cidade');
                $user->num_end_usu = $request->input('Número');
                break;

            case 'Editar Informações de Contato':
                $user->email = $request->input('E-mail');
                $user->cell_usu = $request->input('Número');
                break;

            case 'Atualizar Senha':
                if ($request->input("Senha") === $request->input("c_senha")) {
                    $user->password = bcrypt($request->input("Senha"));
                }
                break;
        }

        $user->update();
        return redirect('user/profile/');
    }

    public function profissional($id, Request $request)
    {
        $user = User::findOrFail($id);

        $cnpj = $request->inCPF;
        $cleanedValue = preg_replace('/[^0-9]/', '', $cnpj);

        if (strlen($cleanedValue) === 11) {
            $cpf = $cleanedValue;
            $user->cpf_usu = $cpf;
        } elseif (strlen($cleanedValue) === 14) {
            $cnpj = $cleanedValue;
            $user->cnpj_usu = $cnpj;
        }

        $user->sobre_usu = $request->inSobre;
        $user->role = 'profissional';
        $user->update();
        return redirect('/dashboard/portfolio/' . $id);
    }

    public function makeProf(Request $request, string $id, string $type)
    {
        $user = User::findOrFail($id);

        if ($type == "prof") {
            $cpf = $request->inCPF;
            $cleanedValue = preg_replace('/[^0-9]/', '', $cpf);
            if (strlen($cleanedValue) == 11) {
                $user->cpf_usu = $cleanedValue;
                $user->cnpj_usu = 0;
            } else {
                $user->cnpj_usu = $cleanedValue;
                $user->cpf_usu = 0;
            }
            $user->sobre_usu = $request->inSobre;
            $user->role = "profissional";
        } else if ($type == "user") {
            $user->role = "user";
        }
        $user->update();

        // fazer o formulario e dps trocar o se ele é profissional
        // return view('profile.form-prof');
        return view('profile.show');
    }

    public function security()
    {
        // $sessions = Sessions::all();
        return view('profile.view-security');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $work = Servico::where('fk_id_usu', $id)->get();
        $lang = Language::where('fk_id_usu', $id)->get();
        $form = Formacao::where('fk_id_usu', $id)->get();
        $xp = Experience::where('fk_id_usu', $id)->get();

        foreach ($work as $item) {
            $item->delete();
        }

        foreach ($lang as $item) {
            $item->delete();
        }

        foreach ($form as $item) {
            $item->delete();
        }

        foreach ($xp as $item) {
            $item->delete();
        }

        $user->delete();

        return redirect('/user/profile');
    }
}
