<?php

namespace App\Providers;

use App\Models\Localization;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;


class LanguageServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('language', function($app){

            $langs = Localization::pluck('id','abbreviation');
            return $langs;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
