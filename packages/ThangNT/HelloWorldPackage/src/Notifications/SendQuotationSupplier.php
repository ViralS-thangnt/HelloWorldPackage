<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SendQuotationSupplier extends Notification implements ShouldQueue
{
    use Queueable;

    public $name;
    public $pdf;
    public $zip;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($name, $pdf, $zip)
    {
        $this->name = $name;
        $this->pdf = $pdf;
        $this->zip = $zip;
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

        \Log::info('Send mail PDF to suppliers: ' . $this->name);
        \Log::info(json_encode($this->pdf));
        \Log::info($this->zip);

        return (new MailMessage)
                    ->greeting('Hello ' . $this->name)
                    ->line('Ink4you send Quotation')
                    ->line('Thank you for using our application!')
                    // ->attachData($this->pdf, 'quotation.pdf')
                    ->attach($this->pdf)
                    ->attach($this->zip);
    }
}
