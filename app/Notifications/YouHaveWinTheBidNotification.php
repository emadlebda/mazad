<?php

namespace App\Notifications;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class YouHaveWinTheBidNotification extends Notification
{
    use Queueable;

    /**
     * @var Post
     */
    private $post;

    public function __construct(Post $post)
    {
        //
        $this->post = $post;
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
            ->subject(config('app.name') . ': You have win the bid for ' . $this->post->title)
            ->greeting('Hi,')
            ->line('we would like to inform you that you have win the bid for ' . $this->post->title)
            ->line('Now we will show your contact number to the seller, to continue your deal ..')
            ->action(config('app.name'), config('app.url'))
            ->line('Thank you')
            ->line(config('app.name') . ' Team')
            ->salutation(' ');
    }
}
