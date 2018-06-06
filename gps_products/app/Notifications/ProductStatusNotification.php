<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\User;

class ProductStatusNotification extends Notification
{
    use Queueable;

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'nexmo'];
    }

   
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Hi '. $this->user->name)
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }
   
    public function toNexmo($notifiable)
    {
        return (new NexmoMessage)
                    ->line('Hi '. $this->user->name)
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
