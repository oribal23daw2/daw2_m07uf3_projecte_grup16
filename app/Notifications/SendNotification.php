<?php
namespace App\Notifications;use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramMessage;class SendNotification extends Notification
{
   use Queueable;   public function __construct()
   {
       //
   }   
   
   public function via($notifiable)
   {
      return ['telegram'];
   }public function toTelegram($notifiable)
   {
      return TelegramMessage::create()
          ->to('-794197572')
          ->content('Enviando nuestro primer mensaje con Telegram');
   }}