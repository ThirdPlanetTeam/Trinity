<?php 
namespace Game;

use Illuminate\Support\ServiceProvider;

class GameServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['game']    = $this->app->share(function($app) { return new \Game\Game; });
    }
}