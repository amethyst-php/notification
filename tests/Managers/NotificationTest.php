<?php

namespace Amethyst\Tests\Managers;

use Amethyst\Fakers\NotificationFaker;
use Amethyst\Managers\NotificationManager;
use Amethyst\Tests\Base;
use Railken\Lem\Support\Testing\TestableBaseTrait;

class NotificationTest extends Base
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
