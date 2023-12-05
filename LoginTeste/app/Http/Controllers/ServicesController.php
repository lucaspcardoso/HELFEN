<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Servico;
use App\Models\SubCategoria;
use Carbon\Carbon;
use Cloudinary\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use MercadoPago\SDK;

class ServicesController extends Controller
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
        $dados = [
            "subCat" => SubCategoria::with("subCat")->get(),
            "cat" => Categoria::all()
        ];
        return view('profile.formService', ["dados" => $dados]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $work = new Servico();
        $work->name_work = $request->name_work;
        $work->descr_work = $request->descr_work;
        if ($request->rua) {
            $work->rua_end_work = $request->rua;
            $work->bairro_end_work = $request->bairro;
            $work->num_end_work = $request->numero;
        }
        $work->duracao_work = $request->duration;
        if ($request->img1) {

            $imagem1 = $request->file('img1');
            $upload = $this->cloudinary->uploadApi()->upload($imagem1->getRealPath());
            $url = $upload['url'];
            $work->image1 = $url;
            if ($request->img2) {
                $imagem2 = $request->file('img2');
                $upload = $this->cloudinary->uploadApi()->upload($imagem2->getRealPath());
                $url2 = $upload['url'];
                $work->image2 = $url2;
                if ($request->img3) {
                    $imagem3 = $request->file('img3');
                    $upload = $this->cloudinary->uploadApi()->upload($imagem3->getRealPath());
                    $url3 = $upload['url'];
                    $work->image3 = $url3;
                }
            }
        }

        if ($request->desconto) {
            $work->desconto_work = $request->desconto;
        }
        $money = ltrim($request->priceWork, '$');
        $work->price_work = $money;

        $work->type_work = $request->typeService;
        $work->fk_id_usu = auth()->user()->id;
        $work->fk_id_cat = $request->category;
        $work->fk_id_subCat = $request->subCat;
        $work->save();

        return redirect('/dashboard/portfolio/' . auth()->user()->id);
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
        $work = Servico::find($id);
        $dados = [
            "subCat" => SubCategoria::with("subCat")->get(),
            "cat" => Categoria::all()
        ];
        return view('profile.formService', ['work' => $work, "dados" => $dados]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $work = Servico::find($id);
        $work->name_work = $request->name_work;
        $work->descr_work = $request->descr_work;
        if ($request->rua) {
            $work->rua_end_work = $request->rua;
            $work->bairro_end_work = $request->bairro;
            $work->num_end_work = $request->numero;
        }
        $work->duracao_work = $request->duration;
        if ($request->img1) {

            $imagem1 = $request->file('img1');
            $upload = $this->cloudinary->uploadApi()->upload($imagem1->getRealPath());
            $url = $upload['url'];
            $work->image1 = $url;
            if ($request->img2) {
                $imagem2 = $request->file('img2');
                $upload = $this->cloudinary->uploadApi()->upload($imagem2->getRealPath());
                $url2 = $upload['url'];
                $work->image2 = $url2;
                if ($request->img3) {
                    $imagem3 = $request->file('img3');
                    $upload = $this->cloudinary->uploadApi()->upload($imagem3->getRealPath());
                    $url3 = $upload['url'];
                    $work->image3 = $url3;
                }
            }
        }

        if ($request->desconto) {
            $work->desconto_work = $request->desconto;
        }
        $money = ltrim($request->priceWork, '$');
        $work->price_work = $money;

        $work->type_work = $request->typeService;
        $work->fk_id_usu = auth()->user()->id;
        $work->fk_id_cat = $request->category;
        $work->fk_id_subCat = $request->subCat;
        $work->update();

        return redirect('/dashboard/portfolio/' . auth()->user()->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $work = Servico::find($id);
        $work->delete();
        return redirect("/dashboard/portfolio/" . auth()->user()->id);
    }
}
