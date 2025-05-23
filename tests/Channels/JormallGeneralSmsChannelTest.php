<?php

namespace TheCodeStash\JormallSms\Tests;

use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;
use PHPUnit\Framework\Attributes\Test;
use TheCodeStash\JormallSms\Channels\JormallGeneralSmsChannel;
use TheCodeStash\JormallSms\Facades\JormallSms;

class JormallGeneralSmsChannelTest extends TestCase
{
    #[Test]
    public function sms_is_sent_via_jormall()
    {
        $notification = new NotificationJormallGeneralSmsChannelTestNotification;
        $notifiable = new NotificationJormalGeneralSmsChannelTestNotifiable;
        $channel = new JormallGeneralSmsChannel;

        JormallSms::shouldReceive('send')
            ->with('962799222222', 'Test message.')
            ->once();

        $channel->send($notifiable, $notification);
    }
}

class NotificationJormalGeneralSmsChannelTestNotifiable
{
    use Notifiable;

    public $phone_number = '962799222222';

    public function routeNotificationForJormallGeneralSms($notification)
    {
        return $this->phone_number;
    }
}

class NotificationJormallGeneralSmsChannelTestNotification extends Notification
{
    public function toJormallGeneralSms($notifiable)
    {
        return 'Test message.';
    }
}
