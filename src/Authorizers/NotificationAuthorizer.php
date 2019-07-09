<?php

namespace Amethyst\Authorizers;

use Railken\Lem\Authorizer;
use Railken\Lem\Tokens;

class NotificationAuthorizer extends Authorizer
{
    /**
     * List of all permissions.
     *
     * @var array
     */
    protected $permissions = [
        Tokens::PERMISSION_CREATE => 'notification.create',
        Tokens::PERMISSION_UPDATE => 'notification.update',
        Tokens::PERMISSION_SHOW   => 'notification.show',
        Tokens::PERMISSION_REMOVE => 'notification.remove',
    ];
}
