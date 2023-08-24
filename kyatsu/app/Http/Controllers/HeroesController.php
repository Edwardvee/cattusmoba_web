<?php 
namespace App\Http\Controllers;
use Illuminate\View\View;
use Illuminate\Http\Request;

use App\Models\Heroes;


class HeroesController extends Controller{

    public function show(string $heroes): View
    {
        return view('heroes', [
            'heroes' => Heroes::where('name', $heroes)->firstOrFail(),
            'heroes_all' => Heroes::orderBy('uuid')->get()  
   
        ]);

    }
}
    