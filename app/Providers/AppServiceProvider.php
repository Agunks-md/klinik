<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Contracts\LoginResponse;
use App\Http\Responses\LoginResponse as CustomLoginResponse;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // 🔥 OVERRIDE LOGIN REDIRECT DI SINI
        $this->app->singleton(LoginResponse::class, CustomLoginResponse::class);
    }

    public function boot(): void
    {
        //
    }
}
