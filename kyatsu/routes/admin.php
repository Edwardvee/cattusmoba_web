<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\UserManagementController;

Route::middleware(["forbid-banned-user"])->prefix("admin")->as("admin.")->group(function () {
        Route::resource('admin_users', UserManagementController::class);
        Route::get("", function () {
                return view("show");
         })->name("admin_main");
})->name("admin");

  