<?php

namespace Railken\Amethyst\Fakers;

use Faker\Factory;
use Railken\Bag;
use Railken\Lem\Faker;

class NotificationFaker extends Faker
{
    /**
     * @return \Railken\Bag
     */
    public function parameters()
    {
        $faker = Factory::create();

        $bag = new Bag();
        $bag->set('id', md5(microtime(true)));
        $bag->set('type', "Railken\Amethyst\Notifications\BaseNotification");
        $bag->set('notifiable_type', 'App\\User');
        $bag->set('notifiable_id', 1);
        $bag->set('data', ['message' => 'A notification.']);

        return $bag;
    }
}
