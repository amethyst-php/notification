<?php

namespace Railken\Amethyst\Models;

use Illuminate\Notifications\DatabaseNotification as Model;
use Railken\Amethyst\Common\ConfigurableModel;
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
