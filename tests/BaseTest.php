<?php

namespace Railken\Amethyst\Tests;

abstract class BaseTest extends \Orchestra\Testbench\TestCase
{
    /**
     * Setup the test environment.
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->artisan('migrate:fresh');
        $this->artisan('amethyst:user:install');
    }

    protected function getPackageProviders($app)
    {
        return [
            \Railken\Amethyst\Providers\NotificationServiceProvider::class,
        ];
    }
}
