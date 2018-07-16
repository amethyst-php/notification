<?php

namespace Railken\LaraOre\Tests\Notification;

use Illuminate\Support\Facades\File;

abstract class BaseTest extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            \Railken\LaraOre\NotificationServiceProvider::class,
        ];
    }

    /**
     * Setup the test environment.
     */
    public function setUp()
    {
        $dotenv = new \Dotenv\Dotenv(__DIR__.'/../..', '.env');
        $dotenv->load();

        parent::setUp();

        $this->artisan('migrate:fresh');
        $this->artisan('lara-ore:user:install');
        // $this->artisan('vendor:publish', ['--provider' => 'Railken\LaraOre\NotificationServiceProvider', '--force' => true]);

        $this->artisan('migrate');
    }
}
