<?php

namespace App\Http\Controllers;

use App\Services\TelegramNotificationService;

class AuthController extends Controller
{
    protected $telegramService;

    public function __construct(TelegramNotificationService $telegramService)
    {
        $this->telegramService = $telegramService;
    }

    public function login()
    {
        // Lógica de inicio de sesión...

        // Enviar notificación de Telegram
        $this->telegramService->sendNotification('¡Se ha iniciado sesión un usuario!');
    }

    public function logout()
    {
        // Lógica de cierre de sesión...

        // Enviar notificación de Telegram
        $this->telegramService->sendNotification('¡Se ha cerrado sesión un usuario!');
    }
}