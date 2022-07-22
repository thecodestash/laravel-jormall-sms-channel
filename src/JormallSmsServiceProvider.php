<?php

namespace TheCodeStash\JormallSms;

use Illuminate\Support\ServiceProvider;

class JormallSmsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/jormall-sms.php', 'jormall-sms');
    }
}
