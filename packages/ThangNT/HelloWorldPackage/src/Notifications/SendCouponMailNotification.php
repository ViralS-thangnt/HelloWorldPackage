<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SendCouponMailNotification extends Notification implements ShouldQueue
{
    use Queueable;
    public $coupon;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($coupon)
    {
        $this->coupon = $coupon;
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
        // \Log::info($this->coupon->thumbnailImage()->first()->name);

        return (new MailMessage)
                    ->view('emails.send-coupon', ['coupon' => $this->coupon])
                    ->subject('A new Coupon published')
                    ->line('A new Coupon published,')
                    ->line('Start date: ' . $this->coupon->start_date)
                    ->line('End date: ' . $this->coupon->expired_date);
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
