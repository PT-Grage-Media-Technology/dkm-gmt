<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
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
    }

    public function register()
    {
        //
    }
}
