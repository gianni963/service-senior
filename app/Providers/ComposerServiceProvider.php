<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['annonces.partials.form_category','welcome.partials.form_searchcategory'],function($view){

            $categories = \App\Category::get()->toTree();


            $view->with(compact('categories'));
        });

        View::composer(['annonces.partials.form_zone','welcome.partials.form_searchzone'],function($view){

            $zones = \App\Zone::get();


            $view->with(compact('zones'));
        });
    
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
