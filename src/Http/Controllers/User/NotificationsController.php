<?php

namespace Railken\Amethyst\Http\Controllers\User;

use Illuminate\Http\Request;
use Railken\Amethyst\Api\Http\Controllers\RestController;
use Railken\Amethyst\Api\Http\Controllers\Traits;
use Railken\Amethyst\Managers\NotificationManager;

class NotificationsController extends RestController
{
    use Traits\RestIndexTrait;
    use Traits\RestShowTrait;

    /**
     * List of params that can be used to perform a search in the index.
     *
     * @var array
     */
    public $queryable = [
        'id',
        'type',
        'notifiable_type',
        'notifiable_id',
        'data',
        'read_at',
        'created_at',
        'updated_at',
    ];

    public function __construct(NotificationManager $manager)
    {
        $this->manager = $manager;

        parent::__construct();
    }

    /**
     * Create a new instance for query.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getQuery()
    {
        return $this->getManager()->getRepository()->getQuery()->where(['notifiable_type' => 'user', 'notifiable_id' => $this->getUser()->id]);
    }

    /**
     * Mark a notification as read.
     *
     * @param int                      $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function markAsRead($id, Request $request)
    {
        /** @var \Railken\Amethyst\Models\Notification */
        $resource = $this->getManager()->getRepository()->findOneById($id);

        if (!$resource && $resource->notifiable->id !== $this->getUser()->id) {
            return $this->not_found();
        }

        $resource->markAsRead();

        return $this->success([]);
    }

    /**
     * Mark a notification as unread.
     *
     * @param int                      $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function markAsUnread($id, Request $request)
    {
        /** @var \Railken\Amethyst\Models\Notification */
        $resource = $this->getManager()->getRepository()->findOneById($id);

        if (!$resource && $resource->notifiable->id !== $this->getUser()->id) {
            return $this->not_found();
        }

        $resource->markAsUnread();

        return $this->success([]);
    }
}
