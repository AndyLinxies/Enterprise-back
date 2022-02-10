<?php

use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\TacheController;
use App\Http\Controllers\UserController;
use App\Models\Entreprise;
use App\Models\Tache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
/api/...
*/

//Routes publiques
Route::get('/', function () {


});
//Register new User est public
Route::post('/register',[UserController::class,'store']);



//Le login est public
Route::post('/login',[UserController::class,'login']);


//Routes Protégés
Route::group(['middleware' => ['auth:sanctum']], function (){

//Register new Entreprise 
Route::post('/CreateEntreprise',[EntrepriseController::class,'store']);

//Show entreprise informations
Route::get('/dashboard/profile', function () {
    $profile=Auth::user()->ent;
    // dd($profile);
    return response()->json([
        'message' =>"Informations sur l'entreprise",
        'data' => $profile
    ],
201);
});

//Les taches de l'entreprise
Route::get('/dashboard/taches', function () {
    //Toute La table entreprise de l'utilisateur connecté
    $profile=Auth::user()->ent;
    //$profile->id =id de l'entreprise de l'utilisateur connecté
    $taches= Tache::where('entreprise_id',$profile->id)->get();
    
    return response()->json([
        'message' =>"Taches de l'entreprise",
        'data' => $taches
    ],
201);
});

//Modifier le Status de la tache
Route::put("/dashboard/tache/update/{id}",[TacheController::class,'update']);

//ajout de Tache
Route::post('/dashboard/tache/create/{id}',[TacheController::class,'storeAPI']);


//Modifier certaines infos de l'entreprise
Route::put("/dashboard/entreprise/update/{id}",[EntrepriseController::class,'update']);


//Voir les messages envoyés à l'admin
Route::get('/dashboard/messageList/', function () {
    //Ceci sert à voir automatiquement les messages de l'entreprise concerné sans devoir passer le $id en paramètre
    $messageEnt=Entreprise::find(Auth::user()->ent->id);
    $thisEntMessages=$messageEnt->message;
    // dd($thisEntMessages);
        return response()->json([
            'message'=> 'Messages récupérés',
            'data' => $thisEntMessages
        ],201);
});

//Envoi de message
Route::post('/dashboard/addMessage',[MessageController::class,'storeEnt']);

//Notifications pour le l'entreprise
Route::get('/dashboard/notifications', function () {
    
    $notifications= Auth::user()->unreadNotifications;

    return response()->json([
        'message' =>"Notifications",
        'data' => $notifications
    ],
201);
});


});
