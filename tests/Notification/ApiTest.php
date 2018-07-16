<?php

namespace Railken\LaraOre\Tests\Notification;

use Illuminate\Support\Facades\Config;
use Railken\LaraOre\Notification\NotificationFaker;
use Railken\LaraOre\Notification\NotificationManager;
use Railken\LaraOre\Support\Testing\ApiTestableTrait;

class ApiTest extends BaseTest
{
    use ApiTestableTrait;

    /**
     * Retrieve basic url.
     *
     * @return string
     */
    public function getBaseUrl()
    {
        return Config::get('ore.api.router.prefix').Config::get('ore.notification.http.router.prefix');
    }

    /**
     * Test common requests.
     *
     * @return void
     */
    public function testSuccessCommon()
    {
        $this->commonTest($this->getBaseUrl(), NotificationFaker::make()->parameters());
    }
}
