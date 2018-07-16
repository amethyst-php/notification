<?php

namespace Railken\LaraOre;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Railken\LaraOre\Api\Support\Router;

class NotificationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $this->publishes([__DIR__.'/../config/ore.notification.php' => config_path('ore.notification.php')], 'config');

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutes();

        config(['ore.permission.managers' => array_merge(Config::get('ore.permission.managers', []), [
            //\Railken\LaraOre\Notification\NotificationManager::class,
        ])]);
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->register(\Railken\Laravel\Manager\ManagerServiceProvider::class);
        $this->app->register(\Railken\LaraOre\ApiServiceProvider::class);
        $this->app->register(\Railken\LaraOre\UserServiceProvider::class);
        $this->mergeConfigFrom(__DIR__.'/../config/ore.notification.php', 'ore.notification');
    }

    /**
     * Load routes.
     */
    public function loadRoutes()
    {
        Router::group(Config::get('ore.notification.http.admin.router'), function ($router) {
            $controller = Config::get('ore.notification.http.admin.controller');

            $router->get('/', ['uses' => $controller.'@index']);
            $router->post('/', ['uses' => $controller.'@create']);
            $router->put('/{id}', ['uses' => $controller.'@update']);
            $router->delete('/{id}', ['uses' => $controller.'@remove']);
            $router->get('/{id}', ['uses' => $controller.'@show']);
        });

        Router::group(Config::get('ore.notification.http.user.router'), function ($router) {
            $controller = Config::get('ore.notification.http.user.controller');

            $router->get('/', ['uses' => $controller.'@index']);
            $router->get('/{id}', ['uses' => $controller.'@show']);
            $router->post('/{id}/read', ['uses' => $controller.'@markAsRead']);
            $router->post('/{id}/unread', ['uses' => $controller.'@markAsUnread']);
        });
    }
}
