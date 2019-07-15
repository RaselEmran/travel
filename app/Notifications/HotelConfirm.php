<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class HotelConfirm extends Notification
{
    use Queueable;
    protected $user;
    protected $booking;
    protected $messege;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($booking,$user,$messege=null)
    {
        $this->user = $user;
        $this->booking = $booking;
        $this->messege = $messege;
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
       $url = route('hotel-chackeout',['secret'=>$this->booking->secret]);
        $user =$this->user;
        $booking =$this->booking;
        $messege =$this->messege;
        return (new MailMessage)->markdown('mail.hotel.confirm',compact('user','booking','messege','url'));
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
