<?php

use App\Http\Controllers\admin\UserManagementController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
#Resources
use App\Models\User;
use App\Validators\ValidatorXHR;
//use App\Http\Resources\UserCollection;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\RedisController;
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


Route::group(["middleware" => ["can: access admin"]], function () {
  Route::prefix("admin")->group(function () {
    Route::resource('admin_users', UserManagementController::class);
  })->name("admin");
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
Route::get("/", function () {
  return view("mainpage");
})->name("mainpage");

Route::get("/gameinfo", function () {
  return view("gameinfo");
})->name("gameinfo");

Route::get('/redis', [RedisController::class, 'index'])->name("redis");

Route::get("/heroes", function () {
  return view("heroes");
})->name("heroes");


Route::get("/dasomnya", function () {
  return view("dasomnya");
})->name("dasomnya");

Route::get("/getCurrentUser", function () {
  return (Auth::user());
});

Route::get("/historia", function () {
  return view("historia");
})->name("historia");
Route::get("/reglas", function () {
  return view("reglas");
})->name("reglas");
Route::get("/como jugar", function () {
  return view("como jugar");
})->name("como jugar");

//GET O POST. Cuando nostros accedamos a la ruta / del sitio.
// Al lado le colocas una coma y definis una funcion sin nombre  (Funciones anonima)-
// El view es una funcion normal, la cual tiene un parametro.
require __DIR__ . '/auth.php';