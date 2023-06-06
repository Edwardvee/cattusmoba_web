<?php

namespace App\Http\Controllers\admin;

use App\Enums\OrderBy;
use Illuminate\Validation\Rules\Enum;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use App\Rules\ColumnExists;

class UserManagementController extends Controller
{
    /*public function __construct(Request $request) {
        if ($request->Ajax()) {
            $this->middleware('throttle:api');
        }
    }*/
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        if (!$request->Ajax()) {
            return view("admin.users");
        }
        $validated = $request->validate([
            'name' => ["required", "string", "max:16"],
            "page" => ["required", "integer"],
            "method" => ["required", "string", new ColumnExists],
            "order" => ["required", new Enum(OrderBy::class)]
        ]); 
        return User::whereRaw($validated['method'] . " LIKE '%" . $validated["name"] . "%'")->orderBy($validated["method"], $validated["order"])->paginate(15, ["*"], "page", $validated["page"]);
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
