<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class RedisController extends Controller
{
    public function index(){
        Redis::set('user:1:first_name', 'Mike');
        echo Redis::get('laravel_database_user:1:first_name');
    }
}
