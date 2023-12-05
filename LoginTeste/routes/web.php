<?php

use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\userAction;
use App\Http\Controllers\EndercoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AvaliacaoController;
use App\Http\Controllers\CalendarioController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\footerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MercadoPagoController;
use App\Http\Controllers\RegisterAdminsControllers;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\UserController;

Route::get('/gerar-pdf/{name}', [PDFController::class, 'gerarPdf']);

Route::controller(RegisterController::class)->group(function () {
    Route::post('/register', 'store')->name('register');
    Route::get('/registerp', 'registerP');
    Route::post('/registerp', 'storeP');
});

Route::middleware(['admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/adminHome/{view}/{rota}', [AdminController::class, 'index']);
    Route::post('/register/{rota}', [RegisterAdminsControllers::class, 'store']);

    Route::get('/adminHome/{rota}/{id}/edit', [RegisterAdminsControllers::class, 'edit']);
    Route::put('/register/update/{rota}/{id}', [RegisterAdminsControllers::class, 'update']);

    Route::delete("/register/delete/{rota}/{id}", [RegisterAdminsControllers::class, "destroy"]);

    Route::post('/', [AdminController::class, 'logout']);
});

Route::get("/profissional/calender/{id}", [CalendarioController::class, 'index']);
Route::post('/calender/register', [CalendarioController::class, 'store']);


// Rotas do controlador AdminController
Route::controller(AdminController::class)->group(function () {
    Route::get('/generate', 'codAleatorio');
    Route::get('/ad/{codigo}', 'create');
    Route::post('/ad/login', 'store');
});

Route::controller(EndercoController::class)->group(function () {
    Route::get('/register/{cep}', 'buscarPorCep');
});

Route::get('/', function () {
    return view('home');
})->name('home');

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'home');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
});




Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/portfolio/{id}', [UserController::class, 'index']);
    Route::post('/dashboard/portfolio/{reg}', [UserController::class, 'store']);
    Route::get('/dashboard/cat', [DashboardController::class, 'index']);
    Route::put('/dashboard/portfolio/{reg}/update/{id}', [UserController::class, 'update']);
    Route::delete('/dashboard/portfolio/{reg}/delete/{id}', [UserController::class, 'destroy']);
    Route::get("/dashboard/portfolio/formProfissional/{id}", [UserController::class, 'formProfissional']);
});


Route::get('/dashboard/message', function () {
    return view('profile.message');
});

Route::get('/dashboard/notificaion', function () {
    return view('profile.notification');
});


Route::get('/dashboard/notificaion', function () {
    return view('profile.set');
});

Route::controller(userAction::class)->group(function () {
    Route::get('user/profile/edit/{tipo}', 'index');
    Route::put('make/{id}/{type}', 'makeProf');
    Route::put('/user/{id}/{tipo}', 'update');
    Route::get('/user/profile/sessions', 'security');
    Route::delete('user/profile/{id}', 'destroy');
    Route::put('/makeProfissional/{id}', 'profissional');
});

// Avaliação
Route::controller(AvaliacaoController::class)->group(function () {
    Route::put('/avaliacao/env/{id}', 'update');
});

// Categoria
Route::controller(CategoriaController::class)->group(function () {
    Route::get("/dashboard/cat/{nameCategoria}", 'index');
});

// Adicionar Serviço
Route::controller(ServicesController::class)->group(function () {
    Route::get('/dashboard/add-service', 'create');
    Route::post('/dashboard/add-service/store', 'store');

    Route::get('/dashboard/add-service/edit/{id}', 'edit');
    Route::put('/dashboard/add-service/update/{id}', 'update');

    Route::delete("/dashboard/add-service/delete/{id}", "destroy");
});

// FooterController
Route::controller(footerController::class)->group(function () {
    Route::get('/termoServico', 'termo');
    Route::get('/contact', 'contact');
});

// Mercado Pago
Route::get('/service/{nameWork}', [MercadoPagoController::class, 'index'])->name('caixa');
Route::get('/service/pag/{nameWork}', [MercadoPagoController::class, 'pagar']);
Route::get('/retorno-pagamento', [MercadoPagoController::class, 'retornoPagamento'])->name('retorno.pagamento');
