<?php

namespace TheCodeStash\JormallSms\Tests;

use Illuminate\Support\Facades\Http;
use PHPUnit\Framework\Attributes\Test;
use Illuminate\Validation\ValidationException;
use TheCodeStash\JormallSms\Facades\JormallSms;

class JormallSmsTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    #[Test]
    public function gets_account_balance()
    {
        Http::fake([
            config('jormall-sms.baseurl').'/*' => Http::response('789', 200),
        ]);

        $balance = JormallSms::balance();

        $this->assertEquals(789, $balance);
    }

    #[Test]
    public function sends_a_general_sms()
    {
        Http::fake([
            config('jormall-sms.baseurl').'/*' => Http::response('MsgID = 101010101', 200),
        ]);

        $response = JormallSms::send('962799222222', 'Test message.');

        $this->assertEquals(['message_id' => '101010101'], $response);
    }

    #[Test]
    public function throws_an_exception_when_sending_a_general_message_if_the_number_is_not_a_valid_jordanian_number()
    {
        try {
            $response = JormallSms::send('966000000000', 'Test message.');
        } catch (ValidationException $exception) {
            $this->assertTrue(true);

            return;
        }

        $this->fail('Expected exception was not thrown.');
    }

    #[Test]
    public function sends_an_otp_sms()
    {
        Http::fake([
            config('jormall-sms.baseurl').'/*' => Http::response('MsgID = 101010101', 200),
        ]);

        $response = JormallSms::sendOtp('962799222222', 'Your otp is 1234');

        $this->assertEquals(['message_id' => '101010101'], $response);
    }

    #[Test]
    public function throws_an_exception_when_sending_an_otp_message_if_the_number_is_not_a_valid_jordanian_number()
    {
        try {
            JormallSms::sendOtp('966000000000', 'Your otp is 1234');
        } catch (ValidationException $exception) {
            $this->assertTrue(true);

            return;
        }

        $this->fail('Expected exception was not thrown.');
    }
}
