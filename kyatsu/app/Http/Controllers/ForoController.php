<?php

namespace App\Http\Controllers;

use App\Models\Foro;
use Illuminate\Http\Request;

class ForoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index(Request $request)
    {  
        if($request->ajax()){
        return json_encode(Foro::all());
        }
        return view("foro");
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
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
    public function show(Foro $foro)
    {
        //
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
