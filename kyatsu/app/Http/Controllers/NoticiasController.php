<?php

namespace App\Http\Controllers;

use App\Models\noticias;
use Illuminate\Http\Request;

class NoticiasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       $noticiasget = noticias::all();
        if ($noticiasget->isNotEmpty()){
            return view('mainpage' , ['noticiasget' => noticias::findOrFail(1)->limit(3)->get()]);

        }
        else{
            return view('mainpage', ['noticiasget' => []]);
        }
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
    public function show(noticias $noticias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(noticias $noticias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, noticias $noticias)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(noticias $noticias)
    {
        //
    }
}
