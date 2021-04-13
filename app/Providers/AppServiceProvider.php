<?php

namespace App\Providers;

use App\Models\Module;
use Illuminate\Support\Facades\Schema;
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

        if (Schema::hasTable('table')) {
            $modules = Module::query()->where('is_preparatory', false)->get();
        
            View::share('modules', $modules);
        }
        
        
    }
}
