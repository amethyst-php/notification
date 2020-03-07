<?php

namespace Amethyst\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification as IlluminateNotification;

class BaseNotification extends IlluminateNotification implements ShouldQueue
{
    use Queueable;

    public $message;
    public $options;

    /**
     * Create a new event instance.
     *
     * @param string $message
     * @param array  $options
     */
    public function __construct($message, array $options = [])
    {
        $this->message = $message;
        $this->options = $options;
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
            'message' => $this->message,
            'options' => $this->options,
        ];
    }
}
