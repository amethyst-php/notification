<?php

namespace Railken\LaraOre\Notification;

use Illuminate\Support\Facades\Config;
use Railken\Laravel\Manager\Contracts\EntityContract;

class Notification extends \Illuminate\Notifications\DatabaseNotification implements EntityContract
{
    /**
     * Creates a new instance of the model.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = Config::get('ore.notification.table');
        $this->fillable = array_merge($this->fillable, array_keys(Config::get('ore.notification.attributes')));
    }
}
