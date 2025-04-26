<?php

namespace TheCodeStash\JormallSms\Tests\Support;

use Illuminate\Validation\ValidationException;
use PHPUnit\Framework\Attributes\Test;
use TheCodeStash\JormallSms\Support\Validator;
use TheCodeStash\JormallSms\Tests\TestCase;

class ValidatorTest extends TestCase
{
    protected $validator;

    protected function setUp(): void
    {
        parent::setUp();

        $this->validator = resolve(Validator::class);
    }

    #[Test]
    public function is_a_string()
    {
        try {
            $this->validator->validateNumber(['962799222222']);
        } catch (ValidationException $exception) {
            $this->assertStringContainsString('The number field must be a string.', $exception->getMessage());

            return;
        }

        $this->fail('Expected exception was not thrown.');
    }

    #[Test]
    public function is_12_characters_long()
    {
        try {
            $this->validator->validateNumber('9627992222221');
        } catch (ValidationException $exception) {
            $this->assertStringContainsString('The number field must be 12 characters.', $exception->getMessage());

            return;
        }

        $this->fail('Expected exception was not thrown.');
    }

    #[Test]
    public function starts_with_9627()
    {
        try {
            $this->validator->validateNumber('062222222222');
        } catch (ValidationException $exception) {
            $this->assertStringContainsString('The number field format is invalid.', $exception->getMessage());

            return;
        }

        $this->fail('Expected exception was not thrown.');
    }

    #[Test]
    public function has_a_valid_local_operator_code()
    {
        $this->assertTrue($this->validator->validateNumber('962779222222'));
        $this->assertTrue($this->validator->validateNumber('962789222222'));
        $this->assertTrue($this->validator->validateNumber('962799222222'));

        try {
            $this->validator->validateNumber('962759222222');
        } catch (ValidationException $exception) {
            $this->assertStringContainsString('The number field format is invalid.', $exception->getMessage());

            return;
        }

        $this->fail('Expected exception was not thrown.');
    }

    #[Test]
    public function does_not_contain_non_numeric_characters_in_the_beginning()
    {
        try {
            $this->validator->validateNumber('+96279922222');
        } catch (ValidationException $exception) {
            $this->assertStringContainsString('The number field format is invalid.', $exception->getMessage());

            return;
        }

        $this->fail('Expected exception was not thrown.');
    }

    #[Test]
    public function does_not_contain_non_numeric_characters_in_the_middle()
    {
        try {
            $this->validator->validateNumber('96279x222222');
        } catch (ValidationException $exception) {
            $this->assertStringContainsString('The number field format is invalid.', $exception->getMessage());

            return;
        }

        $this->fail('Expected exception was not thrown.');
    }

    #[Test]
    public function does_not_contain_non_numeric_characters_in_the_end()
    {
        try {
            $this->validator->validateNumber('96279922222x');
        } catch (ValidationException $exception) {
            $this->assertStringContainsString('The number field format is invalid.', $exception->getMessage());

            return;
        }

        $this->fail('Expected exception was not thrown.');
    }
}
