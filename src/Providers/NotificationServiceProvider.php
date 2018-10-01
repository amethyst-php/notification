<?php

namespace Railken\Amethyst\Providers;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;
use Railken\Amethyst\Api\Support\Router;
use Railken\Amethyst\Common\CommonServiceProvider;

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

        $this->app->register(\Railken\Amethyst\Providers\UserServiceProvider::class);
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

                $router->get('/', ['uses' => $controller.'@index']);
                $router->post('/{id}/read', ['uses' => $controller.'@markAsRead']);
                $router->post('/{id}/unread', ['uses' => $controller.'@markAsUnread']);
            });
        }
    }
}
