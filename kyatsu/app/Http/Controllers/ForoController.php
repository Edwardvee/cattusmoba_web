<?php

namespace App\Http\Controllers;

use App\Models\Foro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class ForoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index(Request $request)
    {  
        if($request->ajax()){
        return json_encode(Foro::orderBy('id','desc')->take(20)->get());
        }
        return view("foro");
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }
    public function post(Request $request)
    {
        if($request->token){
        Foro::insert(array(
            'user_poster' => auth()->user()->name,
            'isChildOf' => $request->isChildOf,
            'content' => $request->content,
            'reply_count' => 0,
            'like_count' => 0,
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => NULL
        ));
        return back();
    }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     */
   

    public function show($id, Request $request)
    {
        if($request->ajax()){
            return json_encode(Foro::query()->where('id','=',$id)->union(Foro::query()->where('isChildOf','=',$id))->get());
            }
            return view("foro", ['id' => $id]); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Foro $foro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Foro $foro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Foro $foro)
    {
        //
    }
}
