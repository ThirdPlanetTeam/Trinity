<?php 
namespace UI;

use Illuminate\Support\ServiceProvider;

class UIServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['javascript']    = $this->app->share(function($app) { return new \UI\JavaScript; });
        $this->app['css']           = $this->app->share(function($app) { return new \UI\Css; });
    }
}