<?php

use App\Http\Controllers\Admin\TesteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/* Grupo de rotas */
Route::get('/login', function () {
    return 'Login';
})->name('login');

// Route::middleware([])->group(function() {

//     Route::prefix('admin')->group(function(){

//         Route::name('admin.')->group(function(){

//             Route::get('/dashboard', [TesteController::class, 'teste'])->name('dashboard');

//             Route::get('/financeiro', [TesteController::class, 'teste'])->name('financeiro');

//             Route::get('/produtos', [TesteController::class, 'teste'])->name('produtos');

//             Route::get('/', function () {
//                 return redirect()->route('admin.dashboard');
//             })->name('home');

//         });

//     });
// });

Route::group([
    'middleware' => [],
    'prefix' => 'admin',
    'name' => 'admin.',
], function(){
        Route::get('/dashboard', [TesteController::class, 'teste'])->name('dashboard');

        Route::get('/financeiro', [TesteController::class, 'teste'])->name('financeiro');

        Route::get('/produtos', [TesteController::class, 'teste'])->name('produtos');

        Route::get('/', function () {
            return redirect()->route('dashboard');
        })->name('home');
});


/* Rotas Nomeadas */
Route::get('/redirect3', function () {
    return redirect()->route('url.name');
});

Route::get('/nome-url', function () {
    return 'Hey hey hey';
})->name('url.name');


/* View */
Route::view('/view', 'welcome', ['id' => 'teste']);

// Route::get('/view', function () {
//     return view('welcome');
// });


/* Redirect */
Route::redirect('/redirect1', '/redirect2');

// Route::get('/redirect1', function () {
//     return redirect('/redirect2');
// });

Route::get('/redirect2', function () {
    return 'Redirect 02';
});


/* Rotas com parâmetros */
Route::get('/produtos/{idProduct?}', function($idProduct = ''){
    return "Produto(s) {$idProduct}";
});

Route::get('/categoria/{flag}/posts', function($flag) { // O nome dos parâmetros precisam ser iguais
    return "Posts da categoria: {$flag}";
});

Route::get('/categorias/{slug}', function($flag) { // O nome dos parâmetros não precisam ser iguais
    return "Produtos da categoria: {$flag}";
});


/* Rotas com match e any */
// Aceita os verbos desejados
Route::match(['get', 'post'], '/match', function() {
    return 'Match';
});

// Aceita qualquer verbo http
Route::any('/any', function() {
    return 'Any';
});


/* Rotas básicas */
Route::post('/register', function () {
    return '';
});

Route::get('/empresa', function () {
    return 'Sobre a empresa';
});

Route::get('/contato', function () {
    return view('site.contact');
});

Route::get('/', function () {
    return view('welcome');
});
