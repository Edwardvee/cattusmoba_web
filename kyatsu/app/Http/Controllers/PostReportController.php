<?php

namespace App\Http\Controllers;

use App\Models\Foro;
use App\Models\PostReport;
use Illuminate\Http\Request;
use App\Models\banReason;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
class PostReportController extends Controller
{
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
        $request = request();
        $request->validate([
            "uuid" => ["required"]
        ]);
        $foro = Foro::FindOrFail($request->uuid);
      //  $user = User::FindOrFail(die(dd($foro->toArray())));
        return view("reportable", [
            "post" => Foro::FindOrFail($request->uuid),
            "banReasons" => banReason::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "post_uuid" => ["required", "exists:" . Foro::class . ",id"],
            "reason" => ["required", "uuid", "exists:" . banReason::class . ",uuid"],
            "message" => ["required", "string", "min:32", "max:512"]
        ]);
        /*
            $table->uuid("reporter_uuid")->references("uuid")->on(User::class);
            $table->uuid("banReason_uuid")->references("uuid")->on(banReason::class);
            $table->foreignId("post_uuid")->references("id")->on(Foro::class);
        */
        $post_report = new PostReport;
        $post_report->reporter_uuid = auth()->user()->uuid;
        $post_report->banReason_uuid = $request->reason;
        $post_report->post_uuid = $request->post_uuid;
        $post_report->message = $request->message;
        $post_report->save();
        die("EXITO");

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
