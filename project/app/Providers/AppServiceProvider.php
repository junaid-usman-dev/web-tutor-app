<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        //
        // view()->share('correct_answer', 0);
        Schema::defaultStringLength(191);
        // date_default_timezone_set('Asia/Shanghai');
        date_default_timezone_set('Asia/Karachi');

    }
}
