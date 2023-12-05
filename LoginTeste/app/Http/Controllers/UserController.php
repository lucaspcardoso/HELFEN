<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Formacao;
use App\Models\Language;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $user = User::find($id);
        return view('profile.portfolio', ['user' => $user]);
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
    public function store(Request $request, $reg)
    {
        if ($reg == 'xp') {
            $experience = new Experience();
            $experience->cargo_empre_trab = $request->cargo;
            $experience->nm_empresa_trab = $request->empresa;
            $experience->desc_trab = $request->desc;
            $experience->anoInicial = $request->dataInicial;
            $experience->anoFinal = $request->dataFinal;
            $experience->fk_id_usu = auth()->user()->id;

            $experience->save();
        } else if ($reg == 'formacao') {
            $formacao = new Formacao();
            if ($request->selectCurso == "curso") {
                $formacao->nm_curso_form = $request->curso;
            } else if ($request->selectCurso == "uni") {
                $formacao->nm_uni_form = $request->universidade;
            }
            $formacao->desc_curso = $request->descUni;
            $formacao->fk_id_usu = auth()->user()->id;
            $formacao->save();
        } else if ($reg == "descUsu") {
            $user = auth()->user();
            $user->desc_usu = $request->descUsu;
            $user->save();
            return redirect('/dashboard/portfolio/' . auth()->user()->id);
        } else if ($reg == "lang") {
            $lang = new Language();
            $lang->name_lingua = $request->selectIdioma;
            $lang->nivel_lingua = $request->selectNivel;
            $lang->fk_id_usu = auth()->user()->id;
            $lang->save();
        }


        return redirect('/dashboard/portfolio/' . auth()->user()->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user, $reg, $id)
    {
        if ($reg == 'xp') {
            $experience = Experience::findOrFail($id);
            $experience->cargo_empre_trab = $request->cargo;
            $experience->nm_empresa_trab = $request->empresa;
            $experience->desc_trab = $request->desc;
            $experience->anoInicial = $request->dataInicial;
            $experience->anoFinal = $request->dataFinal;
            $experience->fk_id_usu = auth()->user()->id;
            $experience->update();
        } else if ($reg == 'formacao') {
            $formacao = Formacao::findOrFail($id);
            if ($request->selectCurso == "curso") {
                $formacao->nm_uni_form = null;
                $formacao->nm_curso_form = $request->curso;
            } else if ($request->selectCurso == "uni") {
                $formacao->nm_curso_form = null;
                $formacao->nm_uni_form = $request->universidade;
            }
            $formacao->desc_curso = $request->descUni;
            $formacao->fk_id_usu = auth()->user()->id;
            $formacao->update();
        } else if ($reg == "descUsu") {
            $user = User::findOrFail(auth()->user()->id);
            $user->desc_usu = $request->descUsu;
            $user->color1 = $request->color1;
            $user->color2 = $request->color2;
            $user->color3 = $request->color3;
            $user->update();
        } else if ($reg == "lang") {
            $lang = Language::findOrFail($id);
            $lang->name_lingua = $request->selectIdioma;
            $lang->nivel_lingua = $request->selectNivel;
            $lang->update();
        }

        return redirect('/dashboard/portfolio/' . auth()->user()->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, $reg, $id)
    {
        if ($reg == 'xp') {
            $experience = Experience::findOrFail($id);
            $experience->delete();
        } else if ($reg == 'formacao') {
            $formacao = Formacao::findOrFail($id);
            $formacao->delete();
        } else if ($reg == 'lang') {
            $lang = Language::findOrFail($id);
            $lang->delete();
        }

        return redirect('dashboard/portfolio');
    }

    public function formProfissional($id)
    {
        return view('profile.formProfissional');
    }
}
