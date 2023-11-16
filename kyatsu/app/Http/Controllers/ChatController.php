<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Log;
class ChatController extends Controller
{
    public function __construct() {
        $this->middleware("auth");
    }
    public function show(string $uuid) {
        //policies, request, observers.
        $chat = Chat::FindOrFail($uuid);
        abort_unless($chat->users->contains(auth()->user()), 403);
        //dd($chat->users->contains(auth()->user()));
        return view("chat", [
            "chat" => $chat
        ]);
    }
    public function chat_with(string $user) {
        $user_a = auth()->user();
        $user_b = User::FindOrFail($user);
        if ($user_a !== null && $user_a instanceof \App\Models\User) {
            $chat = $user_a->chats()->wherehas("users", function ($q) use ($user_b) {
                $q->where("chat_user.user_uuid", $user_b->uuid);
            })->first();
            if (!$chat) {
                $chat = \App\Models\Chat::create([]);
                $chat->users()->sync([$user_a->uuid, $user_b->uuid]);
            }
            return redirect()->route("chat.show", $chat);
        }
    }
}
