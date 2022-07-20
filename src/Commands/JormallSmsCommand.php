<?php

namespace TheCodeStash\JormallSms\Commands;

use Illuminate\Console\Command;

class JormallSmsCommand extends Command
{
    public $signature = 'laravel-jormall-sms-channel';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
