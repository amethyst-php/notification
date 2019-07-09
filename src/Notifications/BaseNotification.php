<?php

namespace Amethyst\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification as IlluminateNotification;

class BaseNotification extends IlluminateNotification implements ShouldQueue
{
    use Queueable;

    public $event;
    public $message;
    public $event_class;
    public $options;

    /**
     * Create a new event instance.
     *
     * @param mixed  $event
     * @param string $message
     * @param array  $options
     */
    public function __construct($event, $message, array $options = [])
    {
        $this->event = $event;
        $this->message = $message;
        $this->options = $options;
        $this->event_class = get_class($event);
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     *
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     *
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'message'     => $this->message,
            'event'       => $this->event,
            'event_class' => $this->event_class,
            'options'     => $this->options,
        ];
    }
}
