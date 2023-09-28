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
 /*      $validator = Validator::make($request->all(), [
        'name' => ["required", "string", "max:16"],
        "page" => ["required", "integer"],
        //"method" => ["required", "string", new ColumnExists((new User)->getTable())],
        "method" => ["required", "string", null],
        "date_method" => ["required", "string", null],
        "date_start" => ["required", "date_format:d/m/Y"],
        "date_end" => ["required", "date_format:d/m/Y"],
        "order" => ["required", new Enum(OrderBy::class)]
    ]);
    if ($validator->fails()) {
     throw new \Illuminate\Validation\ValidationException($validator);
    }
    $validated = $validator->validated();
    foreach($validated as $key => $string) {
        if (Carbon::hasFormat($string, "d/m/Y")) {
            $validated[$key] = Carbon::createFromFormat("d/m/Y", $string)->toDateString();
        }
    }
*/
        $customRequest = app()->makeWith(ValidationRequest::class, ['Model' => new Heroes()]);
        $customRequest->merge($request->all());
        $validated = $customRequest->validated();
        foreach($validated as $key => $string) {
            if (Carbon::hasFormat($string, "d/m/Y")) {
                $validated[$key] = Carbon::createFromFormat("d/m/Y", $string)->toDateString();
            }
        }
       return Heroes::where($validated["method"], "LIKE", (($validated["name"] == "null")  ? "%" : ("%" . $validated["name"] . "%")))->whereBetween($validated["date_method"], [$validated["date_start"] . " 00:00", $validated["date_end"] . " 23:59"] ) ->orderBy($validated["method"], $validated["order"])->paginate(15, ["*"], "page", $validated["page"]);

    }
}
