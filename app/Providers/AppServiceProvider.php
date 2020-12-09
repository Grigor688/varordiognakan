<?php

namespace App\Providers;

use App\Models\Answer;
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
        $answer_inactive = Answer::where('status','inactive')->get()->count();
        view()->share('messages', $answer_inactive);

        Schema::defaultStringLength(191);
    }
}
