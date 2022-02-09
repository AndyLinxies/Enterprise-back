<?php

namespace App\Http\Controllers;

use App\Models\message;
use App\Events\WebsocketMessagesEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id,Request $request)
    {
        $store= new Message;
        $store->message=$request->message;
        $store->user_id= 1;
        //L'id de l'entreprise a été recupéré au niveau de la blade
        $store->entreprise_id=$id;
        $store->sender=Auth::id();
        $store->save();

        broadcast(new WebsocketMessagesEvent($store));
        return ['status'=> 'success'];
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeEnt(Request $request)
    {
        $store= new Message;
        $store->message=$request->message;
        $store->user_id= 1;
        $store->entreprise_id=Auth::user()->ent->id;
        $store->sender=Auth::id();
        $store->save();
        broadcast(new WebsocketMessagesEvent($store));

        return response()->json([
            'message' => 'Message envoyé',
            'data'=>$store
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(message $message)
    {
        //
    }
}
