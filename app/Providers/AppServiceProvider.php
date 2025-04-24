<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        \Illuminate\Support\Facades\Route::middleware(['web'])->group(function () {
            \Illuminate\Support\Facades\Response::macro('nocache', function ($response) {
                return $response->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
                                ->header('Pragma', 'no-cache')
                                ->header('Expires', 'Sat, 01 Jan 2000 00:00:00 GMT');
            });
        });
    }
}
