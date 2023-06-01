<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Validators\ValidatorXHR;
use App\Models\User;
use App\Rules\ColumnExists;
use Illuminate\Support\Facades\RateLimiter;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
  return $request->user();
});

Route::middleware(["throttle:api"])->prefix("frontend")->group(function () {
  $key = request()->user()?->id ?: request()->ip();
  if (RateLimiter::tooManyAttempts($key, 1)) {
    return response()->json(['Se han realizado muchas solicitudes en poco tiempo'], 429)->header('Retry-After', RateLimiter::availableIn($key))->header('Cache-Control', 'no-cache, private');
  }
  Route::get('/user/{name}/{page}', function ($name, $page) {
    $validator = new ValidatorXHR(["name" => $name, "page" => $page], [
      'name' => ["required", "string", "max:16"],
      "page" => ["required", "integer"]
    ]);
    $validated = $validator->validator->validated();
    return User::where("name", "LIKE", "%{$validated["name"]}%")->paginate(15, ["uuid", "name", "created_at"], "page", $validated["page"]);
  })->name("user");

  /*
  Route::middleware(["forbid-banned-user"])->prefix("admin")->group(function () {
    Route::get('/user/{name}/{page}', function ($name, $page) {
      $validator = new ValidatorXHR(["name" => $name, "page" => $page], [
        'name' => ["required", "string", "max:16"],
        "page" => ["required", "integer"],
        "method" => ["required", "string", new ColumnExists]
      ]);
      $validated = $validator->validator->validated();
      return User::where("name", "LIKE", "%{$validated["name"]}%")->paginate(15, ["uuid", "name", "created_at"], "page", $validated["page"]);
    })->name("user");
  })->name("admin");
*/

})->name("frontend");

//Route::middleware(["throttle:api", "can: access admin", "auth", "forbid-banned-user"])->prefix("frontend")->group(function () {