<?php

namespace Amethyst\Managers;

use Amethyst\Core\ConfigurableManager;
use Railken\Lem\Manager;

/**
 * @method \Amethyst\Models\Notification                 newEntity()
 * @method \Amethyst\Schemas\NotificationSchema          getSchema()
 * @method \Amethyst\Repositories\NotificationRepository getRepository()
 * @method \Amethyst\Serializers\NotificationSerializer  getSerializer()
 * @method \Amethyst\Validators\NotificationValidator    getValidator()
 * @method \Amethyst\Authorizers\NotificationAuthorizer  getAuthorizer()
 */
class NotificationManager extends Manager
{
    use ConfigurableManager;

    /**
     * @var string
     */
    protected $config = 'amethyst.notification.data.notification';
}
