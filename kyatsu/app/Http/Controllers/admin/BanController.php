<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\banReason;
use App\Models\User;
use Cog\Laravel\Ban\Models\Ban;
use Illuminate\Support\Facades\Auth;
use Cog\Laravel\Ban\Services\BanService;

class BanController extends Controller
{
    private function validateUUID(): string {
        $request = request();
        $request->validate([
            "uuid" => ["required", "uuid"]
        ]); 
        return $request->uuid;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $uuid = $this->validateUUID();
        return view("admin.ban_user", [
            "user" => User::FindOrFail($uuid),
            "banReasons" => banReason::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "uuid" => ["required", "uuid"],
            "reason" => ["required", "uuid", "exists:" . banReason::class . ",uuid"],
            "message" => ["required", "string", "max:255", "min:32"],
            "expires" => ["required", "date"]
        ]);
        $user = User::FindOrFail($request->uuid);
        $user->ban([
            'ip' => $user->ip,
            'created_by_type' => User::class,
            'created_by_id' => auth()->user()->uuid,
            "comment" => $request->message,
            "expires" => $request->expires
        ]);
        $ban = Ban::latest()->first();
        $ban->ban_reason_uuid = $request->reason;
        $ban->save();
        return view("admin.show_user", ["user" => $user]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $uuid)
    {
        $user = User::FindOrFail($uuid);
        $user_banned = [];
        foreach($user->bans()->getResults() as $Model) {
            array_push($user_banned, $Model->toArray());
        }
        //die($user->bans()->first());
        return view("admin.show_ban", ["user" => $user, "banned" => $user_banned]);

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
