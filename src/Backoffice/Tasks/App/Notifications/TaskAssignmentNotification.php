<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeEncrypted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Lightit\Backoffice\Tasks\Domain\Models\Task;

class TaskAssignmentNotification extends Notification implements ShouldQueue, ShouldBeEncrypted
{
    use Queueable;
    protected Task $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
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
