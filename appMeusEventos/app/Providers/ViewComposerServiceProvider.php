<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // view()->share('categories', \App\Models\Category::all(['name', 'slug']));

//        view()->composer('layouts.site', function ($view) {
//            $view->with('categories', \App\Models\Category::all(['nome', 'slug']));
//        });
        view()->composer('layouts.site', 'App\Http\Views\Composer\CategoiesViewComposer@composer');
    }
}
