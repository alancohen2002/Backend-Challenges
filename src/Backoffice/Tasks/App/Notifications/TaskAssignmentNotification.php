<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Lightit\Backoffice\Tasks\Domain\Models\Task;

class TaskAssignmentNotification extends Notification
{
    use Queueable;

    public function __construct(protected Task $task)
    {
    }

    /**
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage())
                    ->line("Task {$this->task->title} was assigned to {$this->task->employee?->email}.
                            Description: {$this->task->description}")
                    ->action('Our web', url('/'))
                    ->line('Thank you for using our application!');
    }
}
