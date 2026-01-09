<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // safest: disable forcing scheme unless you really have https behind proxy
        // if (app()->environment('production') && request()->header('x-forwarded-proto') === 'https') {
        //     URL::forceScheme('https');
        // }
    }
}
