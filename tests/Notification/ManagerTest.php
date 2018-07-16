<?php

namespace Railken\LaraOre\Tests\Notification;

use Railken\LaraOre\Notification\NotificationFaker;
use Railken\LaraOre\Notification\NotificationManager;
use Railken\LaraOre\Support\Testing\ManagerTestableTrait;

class ManagerTest extends BaseTest
{
    use ManagerTestableTrait;

    /**
     * Retrieve basic url.
     *
     * @return \Railken\Laravel\Manager\Contracts\ManagerContract
     */
    public function getManager()
    {
        return new NotificationManager();
    }

    public function testSuccessCommon()
    {
        $this->commonTest($this->getManager(), NotificationFaker::make()->parameters());
    }
}
