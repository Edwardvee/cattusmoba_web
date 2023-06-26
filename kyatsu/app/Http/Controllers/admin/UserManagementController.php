<?php

namespace App\Http\Controllers\admin;

use App\Enums\OrderBy;
use Illuminate\Validation\Rules\Enum;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use App\Rules\ColumnExists;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserManagementController extends Controller
{
    public function __construct(Request $request) {
        if ($request->Ajax()) {
            $this->middleware('throttle:api');
        } else {
            $this->middleware("throttle");
        }
    }
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        if (!$request->Ajax()) {
            return view("admin.users");
        }
       // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => ["required", "string", "max:16"],
            "page" => ["required", "integer"],
            //"method" => ["required", "string", new ColumnExists((new User)->getTable())],
            "method" => ["required", "string", null],
            "order" => ["required", new Enum(OrderBy::class)]
        ]);
        if ($validator->fails()) {
            //throw new \Illuminate\Validation\ValidationException($validator);
            //die("e");
        }
        $validated = $validator->validated();
       /*$validated = $request->validate([
            'name' => ["required", "string", "max:16"],
            "page" => ["required", "integer"],
            "method" => ["required", "string", new ColumnExists((new User)->getTable())],
            "order" => ["required", new Enum(OrderBy::class)]
        ]);
        if ($request->validated()->fails()) {
            throw new \Illuminate\Validation\ValidationException($request->validated());
        }*/
        return User::whereRaw("name LIKE '%" . $validated["name"] . "%'")->orderBy($validated["method"], $validated["order"])->paginate(15, ["*"], "page", $validated["page"]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
