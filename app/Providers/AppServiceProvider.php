<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\SMS;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Schema;
use Yabacon\Paystack;
use App \{
    GatewayInterface,
    Gateway
};

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        app()->instance(SMS::class, new SMS(config('sms.key'), new Client));
        app()->bind(GatewayInterface::class, function ($app) {
            $p = new Paystack(config('services.paystack.key'));

            return new Gateway($p);
        });
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
