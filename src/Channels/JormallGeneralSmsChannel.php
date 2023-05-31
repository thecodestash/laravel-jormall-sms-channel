<?php

namespace TheCodeStash\JormallSms\Channels;

use Illuminate\Notifications\Notification;
use TheCodeStash\JormallSms\Facades\JormallSms;

class JormallGeneralSmsChannel
{
    /**
     * Send the given notification.
     *
     * @param  mixed  $notifiable
     * @return void
     */
    public function send($notifiable, Notification $notification)
    {
        // Notifiable class must have a method called `routeNotificationForJormallGeneralSms`
        if (! $number = $notifiable->routeNotificationFor('jormall-general-sms', $notification)) {
            return;
        }

        $message = $notification->toJormallGeneralSms($notifiable);

        return JormallSms::send($number, $message);
    }
}
