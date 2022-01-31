<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use App\Models\Tache;
use Illuminate\Http\Request;

class TacheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('partials.createTache');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id,Request $request)
    {
        //Recuperation du Id de l'entreprise
        $entrepriseId=Entreprise::find($id);
        // dd($entrepriseId->id);
        $store= new Tache;
        $store->tache = $request->tache;
        $store->entreprise_id= $entrepriseId->id;
        $store->save();
        return redirect()->back();

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeAPI($id,Request $request)
    {
        //Recuperation du Id de l'entreprise
        $entrepriseId=Entreprise::find($id);
        // dd($entrepriseId->id);
        $store= new Tache;
        $store->tache = $request->tache;
        $store->entreprise_id= $entrepriseId->id;
        $store->save();
        return response()->json([
            'message' =>'Tache ajoutée avec succès',
            'data' => $store
        ],201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tache  $tache
     * @return \Illuminate\Http\Response
     */
    public function show(Tache $tache)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tache  $tache
     * @return \Illuminate\Http\Response
     */
    public function edit(Tache $tache)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tache  $tache
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $update=Tache::find($id);
        $update->done=$request->done;
        $update->save();
        return response()->json([
            'message' =>'status modifié avec succès',
            'data' => $update
        ],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tache  $tache
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tache $tache)
    {
        //
    }
}
