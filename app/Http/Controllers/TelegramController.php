<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram\Bot\Api;
use Telegram\Bot\FileUpload\InputFile;

class TelegramController extends Controller
{
    public function handle(Request $request)
    {
        $telegram = new Api(config('telegram.7105209113:AAH8-pbQOIJo3vtd_VFJRzcP9BeJRiZ8Vws'));
        $chat_id = $request['message']['chat']['id'];
        $text = $request['message']['text'];
        
        if ($text == '/hola') {
            $response = "Hola mundo!";
            $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $response]);
            
            // Para enviar una imagen
            $image_path = public_path('logo.png');
            $response = $telegram->sendPhoto([
                'chat_id' => $chat_id,
                'photo' => new InputFile($image_path),
                'caption' => 'Esta es una imagen de ejemplo.'
            ]);
        }
    }
}