<?php

namespace App\Providers;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
      if ($this->app->environment('production')) {
        // Force HTTPS
        URL::forceScheme('https');
        
        // Special handling for LiveWire
        $this->app['request']->server->set('HTTPS', 'on');
        
        // Trust Railway proxies
        $this->app['request']->setTrustedProxies(
            ['*'],
            Request::HEADER_X_FORWARDED_ALL
        );
    }
}
