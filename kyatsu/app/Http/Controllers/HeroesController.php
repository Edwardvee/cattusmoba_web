<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Support\Carbon;
use App\Models\Heroes;
use App\Http\Requests\ValidationRequest;
class HeroesController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
       if (!$request->ajax()) {
            return view("heroes");
        }
        $customRequest = app()->makeWith(ValidationRequest::class, ['Model' => new Heroes()]);
        $customRequest->merge($request->all());
        $validated = $customRequest->validated();
        foreach($validated as $key => $string) {
            if (Carbon::hasFormat($string, "d/m/Y")) {
                $validated[$key] = Carbon::createFromFormat("d/m/Y", $string)->toDateString();
            }
        }
    //   return Heroes::where($validated["method"], "LIKE", (($validated["name"] == "null")  ? "%" : ("%" . $validated["name"] . "%")))->whereBetween($validated["date_method"], [$validated["date_start"] . " 00:00", $validated["date_end"] . " 23:59"] ) ->orderBy($validated["method"], $validated["order"])->paginate(15, ["*"], "page", $validated["page"]);
    //Si haces un where con el name, solo te devolvera un solo resultado y no paginara correctamente.
    return Heroes::whereBetween($validated["date_method"], [$validated["date_start"] . " 00:00", $validated["date_end"] . " 23:59"] ) ->orderBy($validated["method"], $validated["order"])->paginate(15, ["*"], "page", $validated["page"]);
    }
    
    public function heroes4extra(Request $request)
    {
        $heroesparaextras = heroes::orderBy('created_at', 'desc')->get();
    
        return view('extras', ['getheroes' => $heroesparaextras]);
    }
}
