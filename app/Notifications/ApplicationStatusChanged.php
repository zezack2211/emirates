<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Applications;

class ApplicationStatusChanged extends Notification implements ShouldQueue
{
    use Queueable;

    public $application;
    public $status;

    public function __construct(Applications $application, string $status)
    {
        $this->application = $application;
        $this->status = $status;
    }

    public function via($notifiable)
    {
        return ['mail', 'database']; // سيتم الإشعار بالبريد وتخزينه في قاعدة البيانات
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('تم تحديث حالة طلبك')
            ->greeting('مرحباً ' . $notifiable->name)
            ->line('تم تغيير حالة طلبك إلى: ' . $this->status)
            ->action('عرض الطلب', url('/student/applications')) // غيّره حسب مسارك
            ->line('شكراً لاستخدامك نظام التقديم.');
    }

    public function toDatabase($notifiable)
    {
        return [
            'application_id' => $this->application->id,
            'status' => $this->status,
            'message' => 'تم تغيير حالة طلبك إلى: ' . $this->status,
        ];
    }
}
