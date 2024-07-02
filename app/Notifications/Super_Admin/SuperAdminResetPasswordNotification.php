<?php

namespace App\Notifications\Super_Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SuperAdminResetPasswordNotification extends Notification
{
    use Queueable;

    private $token;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->token=$token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }
    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('مرحبا لقد تلقينا طلب إستعادة كلمة المرور الخاصة بك على موقعنا.')
                    ->line('رجاءاً إضغط على زر "إسترجاع" لإكمال عملية الإسترجاع لكلمة المرور')
                    ->action('إسترجاع', route('super-admin.password.reset',$this->token.'?email='.request()->email))
                    ->line('شكراً لك لإستخدمك لموقعنا');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
