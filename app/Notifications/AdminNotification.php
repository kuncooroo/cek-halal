<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdminNotification extends Notification
{
    use Queueable;

    private $message;
    private $level; 
    private $link;

    public function __construct($message, $level = 'normal', $link = '#')
    {
        $this->message = $message;
        $this->level = $level;
        $this->link = $link;
    }

    public function via($notifiable)
    {
        return ['database']; 
    }

    public function toArray($notifiable)
    {
        return [
            'message' => $this->message,
            'level'   => $this->level,
            'link'    => $this->link,
        ];
    }
}