<?php

namespace App\Http\Controllers\admin;

use Illuminate\Validation\Rules\Enum;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidationRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use App\Rules\ColumnExists;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
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
        //return view("admin.users");
        if (!$request->Ajax()) {
               return view("admin.users");
        }
        $customRequest = app()->makeWith(ValidationRequest::class, ['Model' => new User()]);
        $customRequest->merge($request->all());
        $validated = $customRequest->validated();
        foreach($validated as $key => $string) {
            if (Carbon::hasFormat($string, "d/m/Y")) {
                $validated[$key] = Carbon::createFromFormat("d/m/Y", $string)->toDateString();
            }
        }  
     // dd($validated);

   return User::where($validated["method"], "LIKE", (($validated["name"] == "null")  ? "%" : ("%" . $validated["name"] . "%")))->whereBetween($validated["date_method"], [$validated["date_start"] . " 00:00", $validated["date_end"] . " 23:59"] ) ->orderBy($validated["method"], $validated["order"])->paginate(15, ["*"], "page", $validated["page"]);
    //return User::whereRaw($validated["method"] . " LIKE " . (($validated["name"] == "null")  ? "'%'" : ("'%" . $validated["name"] . "%'")) . " AND " . $validated["date_method"] . " BETWEEN '" . $validated["date_start"] . " 00:00' " . "AND '" . $validated["date_end"] . " 23:59'")->orderBy($validated["method"], $validated["order"])->toSql(); //paginate(15, ["*"], "page", $validated["page"]);
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
    public function show(string $uuid)
    {
        $user = User::FindOrFail($uuid);
        return view("admin.show_user", ["user" => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $uuid)
    {
        $user = User::FindOrFail($uuid);
        return view("admin.editusers", ["user" => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $uuid)
    {
        $user = User::FindOrFail($uuid);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
        ]);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();
        return redirect()->route("admin.admin_users.show", ["admin_user" => $uuid]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
