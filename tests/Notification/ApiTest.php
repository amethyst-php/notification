<?php

namespace Railken\LaraOre\Tests\Notification;

use Illuminate\Support\Facades\Config;
use Railken\LaraOre\Notification\NotificationFaker;
use Railken\LaraOre\Api\Support\Testing\TestableBaseTrait;

class ApiTest extends BaseTest
{
    use TestableBaseTrait;

    /**
     * Faker class.
     *
     * @var string
     */
    protected $faker = NotificationFaker::class;

    /**
     * Router group resource.
     *
     * @var string
     */
    protected $group = 'admin';

    /**
     * Base path config.
     *
     * @var string
     */
    protected $config = 'ore.notification';
}
