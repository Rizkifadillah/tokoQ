<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer('layouts.master', function($view){
            $view->with('setting', Setting::first());
        });

        view()->composer('menu.dashboard.kasir.index', function($view){
            $view->with('setting', Setting::first());
        });

        view()->composer('menu.penjualan.nota_besar', function($view){
            $view->with('setting', Setting::first());
        });


        view()->composer('layouts.guest', function($view){
            $view->with('setting', Setting::first());
        });


        view()->composer('auth.login', function($view){
            $view->with('setting', Setting::first());
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
