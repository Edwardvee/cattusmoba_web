<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function __construct() {
        $this->middleware("auth");
    }

    public function sent(Request $request) {
        $user = auth()->user();
        if ($user !== null && $user instanceof \App\Models\User) {
            $message = $user->messages()->create([
                "content" => $request->content,
                //"chat_user_uuid" => '9aa09db4-eac0-4e29-a21c-aa2052fc05f8'//$request->chat_uuid
                "chat_user_uuid" => $request->chat_user
            ]);
            broadcast(new MessageSent($message))->toOthers();
            return $message;
        }
    }
}
