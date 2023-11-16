<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;

Route::get("/chat/{uuid}", [ChatController::class, 'show'])->name("chat.show");

Route::get("/chat/with/{uuid}", [ChatController::class, "chat_with"])->name("chat.with");

Route::post("/message/sent", [MessageController::class, "sent"])->name("message.sent");