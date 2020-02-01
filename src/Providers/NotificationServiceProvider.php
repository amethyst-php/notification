<?php

namespace Amethyst\Providers;

use Amethyst\Core\Providers\CommonServiceProvider;
use Amethyst\Core\Support\Router;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;

class NotificationServiceProvider extends CommonServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        parent::boot();
        $this->loadExtraRoutes();
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        parent::register();

        $this->app->register(\Amethyst\Providers\UserServiceProvider::class);
    }

    /**
     * Load extra routes.
     */
    public function loadExtraRoutes()
    {
        $config = Config::get('amethyst.notification.http.user.notification');

        if (Arr::get($config, 'enabled')) {
            Router::group('user', Arr::get($config, 'router'), function ($router) use ($config) {
                $controller = Arr::get($config, 'controller');

                $router->get('/', ['as' => 'index', 'uses' => $controller.'@index']);
                $router->get('/{id}', ['as' => 'show', 'uses' => $controller.'@show']);
                $router->post('/{id}/read', ['as' => 'read', 'uses' => $controller.'@markAsRead']);
                $router->post('/{id}/unread', ['as' => 'unread', 'uses' => $controller.'@markAsUnread']);
            });
        }
    }
}
