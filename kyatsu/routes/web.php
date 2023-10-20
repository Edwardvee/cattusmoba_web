<?php

use App\Http\Controllers\admin\UserManagementController;
use App\Http\Controllers\NoticiasController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
#Resources
use App\Models\User;
use App\Validators\ValidatorXHR;
//use App\Http\Resources\UserCollection;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\RedisController;
use Illuminate\Http\Request;
use App\Http\Controllers\user_info;
use App\Models\users_info;
use App\Models\Foro;

use App\Http\Controllers\HeroesController;
use App\Http\Controllers\ForoController;
use Doctrine\DBAL\Schema\Index;

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

Route::group(["middleware" => ["guest"]], function () {
  Route::get("authentication", function () {
    return view("authentication");
  })->name("authentication");
});

Route::get("/user/{uuid}", function ($uuid) {
  $validator = Validator::make(["uuid" => $uuid], [
    "uuid" => ["required", "uuid", "exists:App\Models\User,uuid"]
  ]);

  $validated = $validator->validated();
  return view("user", ["user" => User::findOrFail($validated["uuid"])]);
})->name("users");

Route::get("/user_paginator/{name}/{page}", function ($name, $page) {
  return view("user_paginator", ["name" => $name, "page" => $page]);
})->name("user_paginator");

Route::get("/", [NoticiasController::class , 'index']
)->name("mainpage");

Route::get("/gameinfo", function () {
  return view("gameinfo");
})->name("gameinfo");


Route::get('/redis', [RedisController::class, 'index'])->name("redis");

Route::get("/SessionInfo", function (Request $request) {
  return $request->session()->all();
});

//Route::get("/heroes/{name?}", [HeroesController::class, 'show'])->name("heroes");
Route::get("/heroes", HeroesController::class)->name("heroes");

Route::get("/dasomnya", function () {
  return view("dasomnya");
})->name("dasomnya");

Route::get("/getCurrentUser", function () {
  return (Auth::user());
});

Route::get("/historia", function () {
  return view("historia");
})->name("historia");

Route::get("/patchnotes", function () {
  return view("patchnotes");
})->name("patchnotes");



Route::get("/store", function () {
  return view("store");
})->name("store");
Route::get("/store/{status}", function () {
  return view("store");
})->name("store.status");

/* Route::get("/extras", function () {
  return view("extras");
})->name("extras"); */

/* 
Route::resource('extras', HeroesController::class);
Route::get("/extras", [HeroesController::class , 'heroes4extra'])->name("extras"); */

Route::resource('noticias', NoticiasController::class);
Route::get("/noticias", [NoticiasController::class , 'notPerera'])->name("noticias");

Route::resource('foro', ForoController::class);
Route::get('/foro',[ForoController::class , 'index'])->name('foro');
Route::post('/foro/post',[ForoController::class , 'post'])->name('foro.post');
Route::get('/foro/hilo/{id}/create',[ForoController::class , 'create'])->name('foro.createonComment');
Route::get('/foro/hilo/{id}',[ForoController::class , 'show'])->name('foro.hilo');

Route::get('/token', function (Request $request) {
  $token = $request->session()->token();

  $token = csrf_token();

  return $token;
});

Route::get("/como jugar", function () {
  return view("como jugar");
})->name("como jugar");

Route::get("/isBanned", function () {
  return  (Auth::check()) ? (var_dump(User::findOrFail(Auth::user()?->uuid)->isBanned())) : ("No logueado");
})->name("isBanned");
//GET O POST. Cuando nostros accedamos a la ruta / del sitio.
// Al lado le colocas una coma y definis una funcion sin nombre  (Funciones anonima)-
// El view es una funcion normal, la cual tiene un parametro.
require __DIR__ . '/auth.php';
require __DIR__ . "/admin.php";