<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\users_info;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)//: Response
    {
        Auth::logout();
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            "remember" => ["boolean"]
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        $player= users_info::create([
            'user_id' => $user->uuid,
            'username' => $request->name,
            'profile_pic'=> "default",
            'current_rank' => 'Unranked',
            'current_elo' => '0',
            'description' => 'Hola!',
            'matches_played' => '0',
            'winrate' => '0',
            'main_role' => 'Ninguno'
        ]);

        event(new Registered($user));
        Auth::login($user, ($request->input("remember") ? true : false));
        //return response()->noContent();
        return response()->redirectTo(RouteServiceProvider::HOME);
    }
}
