<?php

namespace TheCodeStash\JormallSms\Support;

use Illuminate\Support\Facades\Validator as LaravelValidator;

class Validator
{
    public function validateNumber($number)
    {
        // Regex explanation
        // - start with '9627'
        // - followed by one of 7,8, or 9 (local operator code)
        // - followed by 7 numeric characters
        LaravelValidator::make(['number' => $number], [
            'number' => ['string', 'size:12', 'regex:#^9627[789][0-9]{7}$#'],
        ])->validate();

        return true;
    }

    public function validateMessage($message)
    {
        LaravelValidator::make(['message' => $message], [
            'message' => ['string', 'max:800'],
        ])->validate();

        return true;
    }
}
