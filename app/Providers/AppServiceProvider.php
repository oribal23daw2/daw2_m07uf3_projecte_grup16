<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\TelegramNotificationService;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(TelegramNotificationService::class, function ($app) {
            return new TelegramNotificationService(config('services.telegram.bot_token'));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
