<?php

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

Route::get('/', function () {
    $sementes = App\Models\Semente::paginate(4);
    return view('welcome', compact('sementes'));
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/semente/{id}', [App\Http\Controllers\SementeController::class, 'show'])->name('semente');

Route::get('/sementes', [App\Http\Controllers\HomeController::class, 'sementes'])->name('sementes');
/*Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('home', 'home')->name('home');
});*/

