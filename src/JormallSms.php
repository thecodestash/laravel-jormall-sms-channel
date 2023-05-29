<?php

namespace TheCodeStash\JormallSms;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use TheCodeStash\JormallSms\Support\Formatter;

class JormallSms
{
    public function __construct()
    {
        $this->formatter = resolve(Formatter::class);
    }

    public function balance()
    {
        $url = config('jormall-sms.baseurl').'/SMS/API/GetBalance';

        $response = Http::withoutVerifying()->throw()->get($url, [
            'AccName' => config('jormall-sms.account_name'),
            'AccPass' => config('jormall-sms.account_password'),
        ]);

        return (int) Str::remove('"', $response->body());
    }

    public function send($number, $message)
    {
        $url = config('jormall-sms.baseurl').'/SMSServices/Clients/Prof/RestSingleSMS_General/SendSMS';

        $response = Http::withoutVerifying()->throw()->get($url, [
            'AccName' => config('jormall-sms.account_name'),
            'AccPass' => config('jormall-sms.account_password'),
            'senderid' => config('jormall-sms.sender_id'),

            'numbers' => $this->formatter->formatNumber($number),
            'msg' => $this->formatter->formatMessage($message),
        ]);

        $response = explode(' = ', $response->body());

        return ['message_id' => data_get($response, '1')];
    }

    public function sendBulk(array $numbers, $message)
    {
        $url = config('jormall-sms.baseurl').'/sms/api/SendBulkMessages.cfm';
        $timeout = 5000000;

        $response = Http::withoutVerifying()->timeout($timeout)->throw()->get($url, [
            'AccName' => config('jormall-sms.account_name'),
            'AccPass' => config('jormall-sms.account_password'),
            'senderid' => config('jormall-sms.sender_id'),

            'numbers' => $this->formatter->formatNumber($numbers),
            'msg' => $this->formatter->formatMessage($message),
            'requesttimeout' => $timeout, // @todo ask what the timeout is based off, ex seconds?
        ]);

        $response = explode(' = ', $response->body());

        return ['message_id' => data_get($response, '1')];
    }

    public function sendOtp($number, $otp)
    {
        $url = config('jormall-sms.baseurl').'/SMSServices/Clients/Prof/RestSingleSMS/SendSMS';

        $response = Http::withoutVerifying()->throw()->get($url, [
            'AccName' => config('jormall-sms.account_name'),
            'AccPass' => config('jormall-sms.account_password'),
            'senderid' => config('jormall-sms.sender_id'),

            'numbers' => $this->formatter->formatNumber($number),
            'msg' => $this->formatter->formatMessage($otp),
        ]);

        $response = explode(' = ', $response->body());

        return ['message_id' => data_get($response, '1')];
    }
}
