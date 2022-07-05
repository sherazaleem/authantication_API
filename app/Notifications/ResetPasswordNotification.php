<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;


class ResetPasswordNotification extends Notification
{
    use Queueable;

    public $token;
    


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
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
    public function toMail($temp)
    {
        // $urlToResetFrom= "/reset-password-form/?token=".$this->token;
        $url = url("http://localhost:8000/reset-password-form/$this->token");
        return (new MailMessage)
                    ->subject('Reset Password Link!')
                    ->line('You request it here we go!')
                    ->line('Copy the token')
                    ->with($this->token)
                    ->action('Reset Password',url($url))
                    ->line('If you did not request a password reset, no further action is required!. Token: ==>'. $this->token);
                   
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
