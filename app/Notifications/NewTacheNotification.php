<?php

namespace App\Notifications;

use App\Models\Tache;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

//Pour les jobs. L'action sera mise dans une Queue. Sera rendra l'experience utilisateur plus fluide sans devoir attendre le chargement. L'action à faire sera enregisté dans la table jobs


class NewTacheNotification extends Notification 

//1 rajout de implements shouldQueue *
//Si event alors implements shouldQueue doit aller dans le listener
//2 Aller dans .env et mettre QUEUE_CONNECTION=database
//3 php artisan queue:table . Creation de la migration jobs
//4 php artisan migrate
//5 php artisan queue:work . Lancement des jobs (php artisan tout simple montre la liste des commandes)
//
{
    use Queueable;

    
    protected $store; //1 Recuperation
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(object $store) //2 Recuperation
    {
        $this->store=$store;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

        return (new MailMessage)
                    ->line('Nouvelle tache recue:')
                    ->line($this->store->tache) //3 Utilisation
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
