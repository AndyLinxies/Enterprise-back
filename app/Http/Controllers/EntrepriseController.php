<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEntrepriseRequest;
use App\Http\Requests\UpdateEntrepriseRequest;
use App\Models\Entreprise;
use Illuminate\Support\Facades\Auth;

class EntrepriseController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEntrepriseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEntrepriseRequest $request)
    {
        $store=new Entreprise;
        // dd(Auth::id());
        $store->nrTVA=$request->nrTVA;
        $store->nomEntreprise=$request->nomEntreprise;
        $store->activiteEntreprise=$request->activiteEntreprise;
        $store->adresseEntreprise=$request->adresseEntreprise;
        $store->villeEntreprise=$request->villeEntreprise;
        $store->paysEntreprise=$request->paysEntreprise;
        $store->phoneEntreprise=$request->phoneEntreprise;
        $store->codePostalEntreprise=$request->codePostalEntreprise;
        $store->user_id=Auth::id();
        $store->persContactEmail=$request->persContactEmail;
        $store->persContactNom=$request->persContactNom;
        $store->persContactphone=$request->persContactphone;
        $store->save();

        return response()->json([
            'message' =>'Entreprise crée avec succès',
            'data' => $store
        ],
    201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Entreprise  $entreprise
     * @return \Illuminate\Http\Response
     */
    public function show(Entreprise $entreprise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Entreprise  $entreprise
     * @return \Illuminate\Http\Response
     */
    public function edit(Entreprise $entreprise)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEntrepriseRequest  $request
     * @param  \App\Models\Entreprise  $entreprise
     * @return \Illuminate\Http\Response
     */
    public function update($id,UpdateEntrepriseRequest $request)
    {
        $update=Entreprise::find($id);
        $update->phoneEntreprise=$request->phoneEntreprise;
        $update->persContactEmail=$request->persContactEmail;
        $update->persContactNom=$request->persContactNom;
        $update->persContactphone=$request->persContactphone;
        $update->save();
        return response()->json([
            'message' =>'Produit modifié avec succès',
            'data' => $update
        ],201);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Entreprise  $entreprise
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entreprise $entreprise)
    {
        //
    }
}
