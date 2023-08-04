<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\AdController;

Route::get('/', [AdController::class, 'index']);
Route::get('/events/create', [AdController::class, 'create']);

Route::get('/criar', function () {
    return view('criar');
});

Route::get('/anuncios', function () {
    return view('anuncios');
});




// Route::get('/produtos/{id}', function ($id) {
//     //poderia ser $id = 1
//     return view('produtos', ['id' => $id]);
// });

// Route::get('/pesquisa', function () {
//     $busca = request('search'); //retorna o conteúdo do parametro search
//     return view('pesquisa', ['busca' => $busca]);
// });