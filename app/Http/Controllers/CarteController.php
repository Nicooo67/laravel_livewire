<?php

namespace App\Http\Controllers;

use App\Models\Carte;
use Illuminate\Http\Request;

class CarteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('cartes');
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
    public function show(Carte $carte)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Carte $carte)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Carte $carte)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Carte $carte)
    {
        //
    }
}
