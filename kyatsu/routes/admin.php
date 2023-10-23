<?php

use App\Http\Controllers\admin\BanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\UserManagementController;

Route::middleware(["forbid-banned-user", "auth"])->prefix("admin")->as("admin.")->group(function () {
        Route::resource('admin_users', UserManagementController::class);
        Route::get("", function () {
                return view("admin.show");
         })->name("admin_main");
         Route::resource("bannable", BanController::class);
})->name("admin");

  