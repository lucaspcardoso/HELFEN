<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Cloudinary\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Categoria;
use App\Models\SubCategoria;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class RegisterAdminsControllers extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $rota)
    {
        switch ($rota) {
            case 'cat':
                $categoria = new Categoria();
                $categoria->nm_categoria = $request->name;
                $imagem = $request->file('imagem');
                $upload = $this->cloudinary->uploadApi()->upload($imagem->getRealPath());
                $url = $upload['url'];

                $categoria->img = $url;
                $categoria->save();
                break;
            case 'subCat':
                $subCat = new SubCategoria();
                $subCat->nm_subCat = $request->name;
                $subCat->fk_id_subCat = $request->categoria;
                $subCat->updated_at = Carbon::now();
                $subCat->created_at = Carbon::now();
                $subCat->save();
                break;
            case 'admin':

                $admin = new User();
                $admin->name = $request->name;
                $admin->email = $request->email;
                $senha = $request->senhaAdmin;
                $senhaConfirmar = $request->confirmSenha;
                if ($senha == $senhaConfirmar) {
                    $admin->password = $senha;
                }
                $admin->role = "admin";
                $admin->save();
                break;
        }

        return redirect("/adminHome/register/$rota");
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
    public function edit($rota, string $id)
    {
        switch ($rota) {
            case 'cat':
                $view = "view";
                $rota = 'cat';
                $name = "Categoria";
                $type = Categoria::find($id);
                break;
            case 'subCat':
                $rota = "subCat";
                $view = "view";
                $name = "Sub Categoria";
                $dados = [
                    "categoria" => Categoria::all()
                ];
                $type = SubCategoria::find($id);
                $categoriaAssociadaId = $type->subCat->id ?? null;
                break;
            case 'admin':
                $rota = "admin";
                $view = "view";
                $name = "Administrador";
                $type = User::find($id);
                break;
        }

        return view('admin.adminRegister', ["type" => $type, "name" => $name, "rota" => $rota, "view" => $view, "dados" => $dados ?? null, "categoriaAssociadaId" => $categoriaAssociadaId ?? null,]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $rota, string $id)
    {
        switch ($rota) {
            case 'cat':
                $categoria = Categoria::find($id);
                $categoria->nm_categoria = $request->name;
                $imagem = $request->file('imagem');

                if ($imagem) {
                    $upload = $this->cloudinary->uploadApi()->upload($imagem->getRealPath());
                    $url = $upload['url'];
                    $categoria->img = $url;
                }

                $categoria->update();

                break;
            case 'subCat':
                $subCat = SubCategoria::find($id);
                $subCat->nm_subCat = $request->name;
                $subCat->fk_id_subCat = $request->categoria;
                $subCat->updated_at = Carbon::now();
                $subCat->created_at = Carbon::now();
                $subCat->update();

                break;
            case 'admin':

                $admin = User::find($id);
                $admin->name = $request->name;
                $admin->email = $request->email;
                $senha = $request->senhaAdmin;
                $senhaConfirmar = $request->confirmSenha;
                if ($senha == $senhaConfirmar) {
                    $admin->password = Hash::make($senha);
                }
                $admin->update();
        }

        return redirect("/admin/dashboard");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($rota, string $id)
    {
        if ($rota == 'user' || $rota == 'admin') {
            $user = User::find($id);
            $user->delete();
        } else if ($rota == 'cat') {
            $categoria = Categoria::find($id);
            $subcategorias = $categoria->cat;
            foreach ($subcategorias as $subcategoria) {
                $fk_id_subcat = $subcategoria->fk_id_subcat;
                $subcategoria->delete();
                SubCategoria::where('fk_id_subcat', $fk_id_subcat)->delete();
            }
            $categoria->delete();
        } else if ($rota == 'subCat') {
            $subCat = SubCategoria::find($id);
            $subCat->delete();
        }
        return redirect("/admin/dashboard");
    }
}
