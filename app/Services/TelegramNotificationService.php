<?php

namespace App\Services;

use GuzzleHttp\Client;

class TelegramNotificationService
{
    protected $telegramBotToken;

    public function __construct($telegramBotToken)
    {
        $this->telegramBotToken = $telegramBotToken;
    }

    public function sendNotification($message)
    {
        // Aquí implementa la lógica para enviar la notificación a través de la API de Telegram
    }
}
