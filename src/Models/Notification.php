<?php

namespace Railken\Amethyst\Models;

use Illuminate\Notifications\DatabaseNotification as Model;
use Illuminate\Support\Facades\Config;
use Railken\Amethyst\Schemas\NotificationSchema;
use Railken\Lem\Contracts\EntityContract;

class Notification extends Model implements EntityContract
{
    /**
     * Creates a new instance of the model.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = Config::get('amethyst.notification.managers.notification.table');
        $this->fillable = (new NotificationSchema())->getNameFillableAttributes();
    }
}
