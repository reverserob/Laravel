<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
     /*
        view()->composer('frontend.master.layout',
            function($view){
               $view->with('categories', Category::all());
            });

          view()->composer('backend.master.layout',
            function($view){
                $view->with('currentUser', Auth::user());
            });
        */
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
