<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\URL;
use App\Models\Lomin;
// use App\Models\Setadurs;


class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Bagikan data setting ke semua views
        View::composer('*', function ($view) {
            $view->with('setting', Lomin::first());
        });

        // View::composer('*', function ($view) {
        //     $view->with('setadurs', Setadurs::first());
        // });

        URL::forceRootUrl(config('app.url'));
        URL::forceScheme('https');
    }

    public function register()
    {
        //
    }
}
