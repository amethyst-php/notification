<?php

namespace Railken\Amethyst\Tests\Managers;

use Railken\Amethyst\Fakers\NotificationFaker;
use Railken\Amethyst\Managers\NotificationManager;
use Railken\Amethyst\Tests\BaseTest;
use Railken\Lem\Support\Testing\TestableBaseTrait;

class NotificationTest extends BaseTest
{
    use TestableBaseTrait;

    /**
     * Manager class.
     *
     * @var string
     */
    protected $manager = NotificationManager::class;

    /**
     * Faker class.
     *
     * @var string
     */
    protected $faker = NotificationFaker::class;
}
