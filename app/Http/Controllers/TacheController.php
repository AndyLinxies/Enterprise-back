<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use App\Models\Tache;
use App\Models\User;
use App\Notifications\NewTacheNotification;
use App\Notifications\RecapSoirNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
// use Illuminate\Notifications\Notifiable;
// use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Notification;

class TacheController extends Controller
{
    // use Notifiable;

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
        //Tous les users sauf celui qui est actuellement connecté (l'admin)
        $allUsers=User::all()->except(Auth::id());

        
        // dd($enOfUser);
        //Recuperation du Id de l'entreprise
        $entrepriseId=Entreprise::find($id);
        // dd($entrepriseId->id);
        $store= new Tache;
        $store->tache = $request->tache;
        $store->entreprise_id= $entrepriseId->id;
        $store->save();
        
        $thisEntUser=$entrepriseId->utilisateur;
        // dd();
        //Mail à la création d'une nouvelle tache
        // $store->notify(new NewTacheNotification());
        
        //On envoie la notification au user dont l'entreprise est concerné (voir Model de l'entreprise, belongsTo)
        //Le mail sera envoyé grace au champs email de du User Récupéré
        //Dans le paramètre de la notification on passe LA nouvelle tache qu'on vient de créer (C'est un object). Il 
        Notification::send($thisEntUser, new NewTacheNotification($store));
        
        //Test recap soir

        // $entreprise=Entreprise::all();
        // foreach ($entreprise as $ent) {
        // $user=User::find($ent->user_id);
        // Notification::send($user, new RecapSoirNotification($ent));

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
