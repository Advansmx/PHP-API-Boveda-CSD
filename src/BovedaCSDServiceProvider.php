<?php

namespace Advans\Api\BovedaCSD;

use Illuminate\Support\ServiceProvider;

class BovedaCSDServiceProvider extends ServiceProvider {

    public function register() {
        $this->app->singleton('boveda-csd', function ($app) {
            return new BovedaCSD(config('boveda-csd'));
        });
    }

}