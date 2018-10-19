<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
            view()->composer('viewer.layouts.master', '\App\Http\ViewComposers\MasterComposer');

            view()->composer('admin.layouts.master', '\App\Http\ViewComposers\ProfileComposer');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
