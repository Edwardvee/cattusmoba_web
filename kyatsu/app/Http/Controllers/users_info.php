<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\users_info;
class user_info extends Controller
{
    function show(){
        $info =  users_info::all();
        return view('users/{uuid}',['info' => $info]);
    }
}
