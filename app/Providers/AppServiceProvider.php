<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\giohang\cart;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            $view->with([
                'cart'=> new cart()
            ]);
        });
    }
}
