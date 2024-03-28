<?php

namespace Amethyst\Tests;

abstract class Base extends \Orchestra\Testbench\TestCase
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
            \Amethyst\Providers\NotificationServiceProvider::class,
        ];
    }
}
