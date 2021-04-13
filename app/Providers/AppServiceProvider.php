<?php

namespace App\Providers;

use App\Models\Module;
use Illuminate\Support\Facades\View;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        // $modules = Module::query()->where('is_preparatory', false)->get();
        // if(!$modules) {
        //     View::share('modules', 'Não tem modulo');
        // }
        // View::share('modules', $modules);
    }
}
