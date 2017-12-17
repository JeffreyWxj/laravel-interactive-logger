<?php

namespace JeffreyWxj\LaravelInteractiveLogger;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class InteractiveLoggerServiceProvider extends ServiceProvider
{
    public function __construct(\Illuminate\Contracts\Foundation\Application $app)
    {
        parent::__construct($app);
        // 是否启用
        $this->enabled = config('interactive-logger.enabled') || env('APP_DEBUG', false);
    }

    protected $defer = false;

    public function boot()
    {
        // if ($this->enabled) {
        $this->loadRoutesFrom(__DIR__ . '/routes.php');
        $this->loadMigrationsFrom(__DIR__ . '/Database/migrations');
        // }
    }

    public function register()
    {
        $this->app->bind('InteractiveLog', function ($app) {
            return new InteractiveLog($app);
        });
    }
}