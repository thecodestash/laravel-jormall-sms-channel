<?php

namespace TheCodeStash\JormallSms\Tests\Support;

use TheCodeStash\JormallSms\Tests\TestCase;
use TheCodeStash\JormallSms\Support\Formatter;

class FormatterTest extends TestCase
{
    protected $formatter;

    protected function setUp(): void
    {
        parent::setUp();

        $this->formatter = resolve(Formatter::class);
    }

    /** @test */
    public function formats_local_numbers()
    {
        $this->assertEquals('962799222222', $this->formatter->formatNumber('0799222222'));
    }

    /** @test */
    public function formats_international_numbers_with_leading_zeros()
    {
        $this->assertEquals('962799222222', $this->formatter->formatNumber('00962799222222'));
    }

    /** @test */
    public function formats_international_numbers_with_leading_plus()
    {
        $this->assertEquals('962799222222', $this->formatter->formatNumber('+962799222222'));
    }

    /** @test */
    public function formats_an_array_of_numbers_in_different_cases()
    {
        $this->assertEquals(
            '962799111111,962799222222,962799333333',
            $this->formatter->formatNumbers(['0799111111', '00962799222222', '+962799333333'])
        );
    }

    /** @test */
    public function encodes_percentage_and_ampersand_signs_in_the_message_body()
    {
        $this->assertEquals(
            'A song of ice %26 fire is 80%25 complete',
            $this->formatter->formatMessage('A song of ice & fire is 80% complete')
        );
    }
}
