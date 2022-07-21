<?php

namespace TheCodeStash\JormallSms\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \TheCodeStash\JormallSms\JormallSms
 */
class JormallSms extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \TheCodeStash\JormallSms\JormallSms::class;
    }
}
