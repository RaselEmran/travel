<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CheckoutNotification extends Notification {
	use Queueable;
	protected $user;
	protected $packege;
	protected $messege;
	/**
	 * Create a new notification instance.
	 *
	 * @return void
	 */
	public function __construct($packege,$user,$messege=null) {
		$this->user = $user;
		$this->packege = $packege;
		$this->messege = $messege;
	}

	/**
	 * Get the notification's delivery channels.
	 *
	 * @param  mixed  $notifiable
	 * @return array
	 */
	public function via($notifiable) {
		return ['mail'];
	}

	/**
	 * Get the mail representation of the notification.
	 *
	 * @param  mixed  $notifiable
	 * @return \Illuminate\Notifications\Messages\MailMessage
	 */
	public function toMail($notifiable) {
		$user =$this->user;
		$packege =$this->packege;
		$messege =$this->messege;
		return (new MailMessage)
		 	->subject('Booking Confirmation')
			->view('admin.email.packege_checkout',compact('user','packege','messege'));
	}

	/**
	 * Get the array representation of the notification.
	 *
	 * @param  mixed  $notifiable
	 * @return array
	 */
	public function toArray($notifiable) {
		return [
			//
		];
	}
}
