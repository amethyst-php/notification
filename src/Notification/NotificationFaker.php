<?php

namespace Railken\LaraOre\Notification;

use Faker\Factory;
use Railken\Bag;
use Railken\Laravel\Manager\BaseFaker;

class NotificationFaker extends BaseFaker
{
    /**
     * @var string
     */
    protected $manager = NotificationManager::class;

    /**
     * @return \Railken\Bag
     */
    public function parameters()
    {
        $faker = Factory::create();

        $bag = new Bag();
        $bag->set('id', 1);
        $bag->set('type', $faker->name);
        $bag->set('notifiable_type', 'App\\User');
        $bag->set('notifiable_id', 1);
        $bag->set('data', []);

        return $bag;
    }
}
