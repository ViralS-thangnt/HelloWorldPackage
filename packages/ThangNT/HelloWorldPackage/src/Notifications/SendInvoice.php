<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SendInvoice extends Notification
{

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($name, $orderId)
    {
        $this->name = $name;
        $this->orderId = $orderId;
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
                    ->greeting('Hello ' . $this->name)
                    ->line('Ink4you send invoice')
                    ->action('Invoice', route('orders.invoice', $this->orderId))
                    ->line('Thank you for using our application!');
    }

}
