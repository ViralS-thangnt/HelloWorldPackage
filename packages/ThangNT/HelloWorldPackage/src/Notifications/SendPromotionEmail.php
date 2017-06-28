<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SendPromotionEmail extends Notification implements ShouldQueue
{
    use Queueable;
    public $promotion;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($promotion)
    {
        $this->promotion = $promotion;
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
                    ->view('emails.send-promotion', ['promotion' => $this->promotion])
                    ->subject('A new Promotion published')
                    ->line('A new Promotion published,')
                    ->line('Start date: ' . $this->promotion->start_date)
                    ->line('End date: ' . $this->promotion->end_date);
                    // ->action('Notification Action', 'https://laravel.com')
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
