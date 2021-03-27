<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\MailManager;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class MassageSend extends Notification
{
    
    protected $mensaje;
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($mensaje)
    {
        $this->mensaje = $mensaje;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
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
                    ->greeting($notifiable->name. ",")
                    ->subject('Mensja recibido desde tu sitio web')
                    ->line('Has recibido un mensaje')
                    ->action('Click para ver el mensaje', route('messages.show', $this->mensaje->id))
                    ->line('Gracias por usar la aplicacion'); 

      
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
            'link' => route('messages.show', $this->mensaje->id),
            'text' => 'Has Recibido un mensaje de ' . $this->mensaje->sender->name
        ];
    }
}
