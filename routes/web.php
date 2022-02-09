<?php

use App\Http\Controllers\MessageController;
use App\Http\Controllers\TacheController;
use App\Http\Controllers\SocialiteController;
use App\Models\Entreprise;
use App\Models\message;
use App\Models\Tache;
use App\Models\User;
use App\Events\WebsocketMessagesEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth']], function() {
    
    
Route::get('/admin/messageList/{id}', function ($id) {
    // dd(Entreprise::);
    $messageEnt=Entreprise::find($id);
    $thisEntMessages=$messageEnt->message;
        return view('partials.messageList',compact('thisEntMessages','messageEnt'));
});
Route::get('/admin/entreprises', function () {
    $entreprises=Entreprise::all();
    // dd($entreprises);
    return view('partials.entreprisesInfo',compact('entreprises'));
});

Route::post('/admin/addMessage/{id}',[MessageController::class,'store']);

//Show de l'entreprise
Route::get('/admin/entreprise/{id}', function ($id) {
    $show=Entreprise::find($id);
    
    return view('partials.showEntreprise',compact('show'));
});

//Taches
// Route::get('/admin/tache/create',[TacheController::class,'create']);

Route::post('/admin/tache/create/{id}',[TacheController::class,'store']);



});

//Socialite: 

// Route::get("login-register", [SocialiteController::class,'loginRegister']);

// // La redirection vers le provider
// Route::get("redirect/google", [SocialiteController::class,'redirect'])->name('socialite.redirect');

// // Le callback du provider
// Route::get("callback/google", [SocialiteController::class,'callback'])->name('socialite.callback');
Route::get("login-register",    [App\Http\Controllers\SocialiteController::class, 'loginRegister']);
Route::get("redirect/{provider}", [App\Http\Controllers\SocialiteController::class, 'redirect'])->name('socialite.redirect');
Route::get("callback/{provider}",[App\Http\Controllers\SocialiteController::class, 'callback'])->name('socialite.callback');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

