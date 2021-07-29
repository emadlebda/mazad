<?php

namespace App\Notifications;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DataChangeEmailNotification extends Notification
{
    use Queueable;

    /**
     * @var Post
     */
    private $post;

    public function __construct($data, Post $post)
    {
        $this->data = $data;
        $this->post = $post;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return $this->getMessage();
    }

    public function getMessage()
    {
        return (new MailMessage())
            ->subject(config('app.name') . ': entry ' . $this->data['action'] . ' in ' . $this->data['model_name'])
            ->greeting('Hi,')
            ->line('we would like to inform you that entry has been ' . $this->data['action'] . ' in ' . $this->data['model_name'])
            ->line('Please log in to see more information.')
            ->action('New Post', route('admin.posts.show', $this->post->id))
            ->line('Thank you')
            ->line(config('app.name') . ' Team')
            ->salutation(' ');
    }
}
