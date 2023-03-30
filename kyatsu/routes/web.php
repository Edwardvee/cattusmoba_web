<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

/*
Route::get('/', function () {
    return ['Laravel' => app()->version()];
});
*/
//Route::middleware["auth"]
Route::group(["middleware" => ["guest"]], function () {
    Route::get("authentication", function () {
        return view("authentication");
    })->name("authentication");
});

Route::get("/getCurrentUser", function () {
    return (Auth::user());
});

//GET O POST. Cuando nostros accedamos a la ruta / del sitio.
// Al lado le colocas una coma y definis una funcion sin nombre  (Funciones anonima)-
// El view es una funcion normal, la cual tiene un parametro.
Route::get("/", function () {
    return view("mainpage");
});
require __DIR__.'/auth.php';
