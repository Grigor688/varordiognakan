<?php

namespace App\Providers;

use App\Models\Answer;
use App\Models\Card;
use App\Models\BuyModel;
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

        $card_inactive = Card::where('status', 'inactive')->get()->count();
        view()->share('count', $card_inactive);

        $idram_inactive = BuyModel::where('status', 'inactive')->get()->count();
        view()->share('idramcount', $idram_inactive);

        Schema::defaultStringLength(191);
    }
}
