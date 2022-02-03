<?php

namespace App\Console\Commands;

use App\Models\Entreprise;
use App\Models\User;
use App\Notifications\RecapSoirNotification;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class RecapTachesSoir extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'recap:soir';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Command Pour envoi d'emails au soir concernant les taches";

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // $entreprise=Entreprise::all()->ent;
        echo 'Voici ma première commande';
    //     $users=User::all();
    //     foreach ($users as $user) {
            
        
    //     Notification::send(Auth::user(), new RecapSoirNotification($user->email));
    // }
    }
}
