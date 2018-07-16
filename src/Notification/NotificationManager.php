<?php

namespace Railken\LaraOre\Notification;

use Illuminate\Support\Facades\Config;
use Railken\Laravel\Manager\Contracts\AgentContract;
use Railken\Laravel\Manager\ModelManager;
use Railken\Laravel\Manager\Tokens;

class NotificationManager extends ModelManager
{
    /**
     * Class name entity.
     *
     * @var string
     */
    public $entity;

    /**
     * List of all attributes.
     *
     * @var array
     */
    protected $attributes = [
        Attributes\Id\IdAttribute::class,
        Attributes\CreatedAt\CreatedAtAttribute::class,
        Attributes\UpdatedAt\UpdatedAtAttribute::class,
        Attributes\Type\TypeAttribute::class,
        Attributes\NotifiableType\NotifiableTypeAttribute::class,
        Attributes\NotifiableId\NotifiableIdAttribute::class,
        Attributes\ReadAt\ReadAtAttribute::class,
        Attributes\Data\DataAttribute::class,
    ];

    /**
     * List of all exceptions.
     *
     * @var array
     */
    protected $exceptions = [
        Tokens::NOT_AUTHORIZED => Exceptions\NotificationNotAuthorizedException::class,
    ];

    /**
     * Construct.
     *
     * @param AgentContract $agent
     */
    public function __construct(AgentContract $agent = null)
    {
        $this->entity = Config::get('ore.notification.entity');
        $this->attributes = array_merge($this->attributes, array_values(Config::get('ore.notification.attributes')));

        $classRepository = Config::get('ore.notification.repository');
        $this->setRepository(new $classRepository($this));

        $classSerializer = Config::get('ore.notification.serializer');
        $this->setSerializer(new $classSerializer($this));

        $classAuthorizer = Config::get('ore.notification.authorizer');
        $this->setAuthorizer(new $classAuthorizer($this));

        $classValidator = Config::get('ore.notification.validator');
        $this->setValidator(new $classValidator($this));

        parent::__construct($agent);
    }
}
