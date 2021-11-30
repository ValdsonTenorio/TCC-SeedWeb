<?php

use App\Http\Controllers\SementeController;
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

/*Route::get('/', function () {
    $sementes = App\Models\Semente::paginate(4);
    return view('welcome', compact('sementes'));

});*/
Route::get('/', [App\Http\Controllers\SementeController::class, 'index'])->name('semente.index');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

//Auth::routes();





Route::get('/semente/search', [App\Http\Controllers\SementeController::class, 'search'])->name('semente.search');
Route::get('/semente', [App\Http\Controllers\SementeController::class, 'index'])->name('semente.index');
Route::get('/semente/{id}', [App\Http\Controllers\SementeController::class, 'show'])->name('semente.show');




Route::get('/sementes', [App\Http\Controllers\HomeController::class, 'sementes'])->name('sementes');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/pesquisador/solicitarpermissao', [App\Http\Controllers\PesquisadorController::class, 'create'])->name('pesquisador.permissao');
    Route::get('/pesquisador/search', [App\Http\Controllers\PesquisadorController::class, 'search'])->name('pesquisador.search');
    Route::get('/pesquisador', [App\Http\Controllers\PesquisadorController::class, 'index'])->name('pesquisador.index');
    Route::get('/pesquisador/create', [App\Http\Controllers\PesquisadorController::class, 'create'])->name('pesquisador.create');
    Route::get('/pesquisador/avaliar', [App\Http\Controllers\PesquisadorController::class, 'avaliar'])->name('pesquisador.avaliar');
    Route::post('/pesquisador/store', [App\Http\Controllers\PesquisadorController::class, 'store'])->name('pesquisador.store');
    Route::post('/pesquisador/aprovar', [App\Http\Controllers\PesquisadorController::class, 'aprovar'])->name('pesquisador.aprovar');
    Route::put('/pesquisador/negar', [App\Http\Controllers\PesquisadorController::class, 'negar'])->name('pesquisador.negar');
    Route::get('/pesquisador/solicitacoes', [App\Http\Controllers\PesquisadorController::class, 'solicitacoes'])->name('pesquisador.solicitacoes');
    Route::get('/pesquisador/{id}', [App\Http\Controllers\PesquisadorController::class, 'show'])->name('pesquisador.show');
    Route::get('/pesquisador/edit/{id}', [App\Http\Controllers\PesquisadorController::class, 'edit'])->name('pesquisador.edit');
    Route::put('/pesquisador/{id}', [App\Http\Controllers\PesquisadorController::class, 'update'])->name('pesquisador.update');
    Route::delete('/pesquisador/{id}', [App\Http\Controllers\PesquisadorController::class, 'destroy'])->name('pesquisador.destroy');
    Route::get('/semente/create', [App\Http\Controllers\SementeController::class, 'create'])->name('semente.create');
    Route::post('/semente/store', [App\Http\Controllers\SementeController::class, 'store'])->name('semente.store');
    Route::put('/semente/{id}', [App\Http\Controllers\SementeController::class, 'update'])->name('semente.update');
    Route::delete('/semente/{id}', [App\Http\Controllers\SementeController::class, 'destroy'])->name('semente.destroy');
    Route::get('/semente/edit/{id}', [App\Http\Controllers\SementeController::class, 'edit'])->name('semente.edit');


});

