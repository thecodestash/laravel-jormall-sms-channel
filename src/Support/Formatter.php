<?php

namespace TheCodeStash\JormallSms\Support;

use Illuminate\Support\Str;
use Illuminate\Support\Collection;

class Formatter
{
    protected $validator;

    public function __construct()
    {
        $this->validator = resolve(Validator::class);
    }

    public function formatNumber($number)
    {
        $number = Str::of($number);

        if ($number->startsWith('00962')) {
            $number = $number->replaceFirst('00962', '962');
        }

        if ($number->startsWith('+962')) {
            $number = $number->replaceFirst('+962', '962');
        }

        if ($number->startsWith('07')) {
            $number = $number->replaceFirst('07', '9627');
        }

        $this->validator->validateNumber($number->__toString());

        return $number->__toString();
    }

    public function formatNumbers($numbers)
    {
        if (! is_array($numbers) && ! $numbers instanceof Collection) {
            $numbers = [$numbers];
        }

        if (! $numbers instanceof Collection) {
            $numbers = collect($numbers);
        }

        return $numbers
            ->map(function ($number) {
                return $this->formatNumber($number);
            })
            ->join(',');
    }

    public function formatMessage($message)
    {
        $message = Str::of($message)->replace('%', '%25')->replace('&', '%26')->__toString();

        $this->validator->validateMessage($message);

        return $message;
    }
}
