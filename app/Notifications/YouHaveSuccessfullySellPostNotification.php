<?php

namespace App\Notifications;

use App\Models\Post;
use App\Models\User;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class YouHaveSuccessfullySellPostNotification extends Notification
{
    /**
     * @var Post
     */
    private $post;
    /**
     * @var User
     */
    private $user;

    public function __construct(Post $post, User $user)
    {
        $this->post = $post;
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
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
            ->subject(config('app.name') . ': You have successfully sell your post: ' . $this->post->title)
            ->greeting('Hi,')
            ->line('we would like to inform you that you have  successfully sell your post ' . $this->post->title . ' to ' . $this->user->name)
            ->line('Here is the buyer contact information, to continue your deal ..')
            ->line('Email : ' . $this->user->email)
            ->line('Mobile number : ' . $this->user->mobile)
            ->action(config('app.name'), config('app.url'))
            ->line('Thank you')
            ->line(config('app.name') . ' Team')
            ->salutation(' ');
    }
}
