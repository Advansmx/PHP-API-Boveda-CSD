<?php

namespace Advans\Api\BovedaCSD;

use Illuminate\Support\ServiceProvider;

class BovedaCSDServiceProvider extends ServiceProvider {

    public function register() {
        $this->app->singleton('boveda-csd', function ($app) {
            $config = new Config(config('boveda-csd'));
            return new BovedaCSD($config);
        });
    }

}