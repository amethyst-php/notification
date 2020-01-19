<?php

namespace Amethyst\Models;

use Amethyst\Core\ConfigurableModel;
use Illuminate\Notifications\DatabaseNotification as Model;
use Railken\Lem\Contracts\EntityContract;

class Notification extends Model implements EntityContract
{
    use ConfigurableModel;

    /**
     * Create a new Eloquent model instance.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->ini('amethyst.notification.data.notification');
        parent::__construct($attributes);
    }
}
