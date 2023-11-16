<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function __construct() {
        $this->middleware("auth");
    }

    public function sent(Request $request) {
        $user = auth()->user();
        if ($user !== null && $user instanceof \App\Models\User) {
            $request->validate([
                "content" => ["required", "string"],
                "chat_uuid" => ["required", "uuid", "exists:" . Chat::class]
            ]);
          /*  $message = Message::create([
                "user_uuid" => $user->uuid,
                "content" => $request->content,
                "chat_uuid" => $request->chat_uuid 
            ])->toSql();*/
            $message = $user->messages()->create([
                "user_uuid" => $user->uuid,
                "content" => $request->content,
                "chat_uuid" => $request->chat_uuid
            ])->toSql();
            dd($message); //->load("user");
            return $message;
        }
    }
}
