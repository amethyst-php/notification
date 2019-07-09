<?php

namespace Amethyst\Schemas;

use Railken\Lem\Attributes;
use Railken\Lem\Schema;

class NotificationSchema extends Schema
{
    /**
     * Get all the attributes.
     *
     * @var array
     */
    public function getAttributes()
    {
        return [
            Attributes\IdAttribute::make()
                ->setFillable(true)
                ->setRequired(true),
            Attributes\TextAttribute::make('type')
                ->setRequired(true),
            Attributes\TextAttribute::make('notifiable_type')
                ->setRequired(true),
            Attributes\TextAttribute::make('notifiable_id')
                ->setRequired(true),
            Attributes\ObjectAttribute::make('data'),
            Attributes\DateTimeAttribute::make('read_at'),
            Attributes\CreatedAtAttribute::make(),
            Attributes\UpdatedAtAttribute::make(),
        ];
    }
}
