<?php

namespace App\Http\Controllers;

use App\Events\NewUserEvent as EventsNewUserEvent;
use App\Mail\CreationCompte;
use App\Models\User;
use App\Notifications\WelcomeEmailNotification;
use App\Providers\NewUserEvent;
use Illuminate\Validation\Rules;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
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
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required'],
        ]);
        // dd($request->password);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        //Le Token Il sera stocké dans la DB
        $token=$user->createToken('myToken')->plainTextToken;

        //La création de l'entreprise se fait après
        
        $response= [
            'message'=>'Utilisateur créé avec succès',
            'user' => $user,
            'token' => $token
        ];

        //Sans events
        //Mail à la création d'un nouveau compte
        // $user->notify(new WelcomeEmailNotification());

        //Avec events . Voir EventServiceProvider
        event(new EventsNewUserEvent($user));

        return response($response,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {

        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required'],
        ]);
        

        //Verification du email. Va chercher le user dont le email est égal au email écrit dans le input
        $user= User::where('email', $request->email)->first();

    
        //Verification du Password
        
        if (!$user || !Hash::check($request->password, $user->password)) { //Pour le hash check on verifie le input password (1er param) avec le password du user qu'on a dans notre DB (2e param)
            //Si le email ou le password n'est pas bon:
            return response([
                'message' => "L'email ou le Password n'est pas correct"
            ],401 );//401=Unauthorized
        } else {
            // Si les deux sont bons
             //Le Token. Il sera stocké dans la DB
        $token=$user->createToken('myToken')->plainTextToken;

        $response= [
            'message'=>'Vous vous êtes connecté avec succès',
            'user' => $user,
            'token2' => $token,
            'status'=>201
        ];

        return response($response,201);
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
