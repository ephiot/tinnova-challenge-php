<?php

namespace Tests\Unit\Services;

use App\Services\ElectionCalculator;
use App\Exceptions\DivisionByZeroException;
use App\Exceptions\NegativeValueException;
use PHPUnit\Framework\TestCase;

class ElectionCalculatorTest extends TestCase
{
    /**
     * getValidVotesPercentage must return a valid float
     *
     * @return void
     */
    public function test_get_valid_votes_percentage_must_return_valid_float()
    {
        $service = new ElectionCalculator();

        $percentage = $service->getValidVotesPercentage(100, 100);

        $this->assertIsFloat($percentage);
        $this->assertEquals(100, $percentage);
    }

    /**
     * getValidVotesPercentage must throw an exception when voters is 0
     *
     * @return void
     */
    public function test_get_valid_votes_percentage_must_throw_exception_when_voters_0()
    {
        $this->expectException(DivisionByZeroException::class);

        $service = new ElectionCalculator();

        $percentage = $service->getValidVotesPercentage(0, 100);
    }

    /**
     * getValidVotesPercentage must throw an exception when voters is negative
     *
     * @return void
     */
    public function test_get_valid_votes_percentage_must_throw_exception_when_voters_is_negative()
    {
        $this->expectException(NegativeValueException::class);

        $service = new ElectionCalculator();

        $percentage = $service->getValidVotesPercentage(-1, 100);
    }

    /**
     * getValidVotesPercentage must throw an exception when votes is negative
     *
     * @return void
     */
    public function test_get_valid_votes_percentage_must_throw_exception_when_votes_is_negative()
    {
        $this->expectException(NegativeValueException::class);

        $service = new ElectionCalculator();

        $percentage = $service->getValidVotesPercentage(100, -1);
    }

    // -------

    /**
     * getBlankVotesPercentage must return a valid float
     *
     * @return void
     */
    public function test_get_blank_votes_percentage_must_return_valid_float()
    {
        $service = new ElectionCalculator();

        $percentage = $service->getBlankVotesPercentage(100, 100);

        $this->assertIsFloat($percentage);
        $this->assertEquals(100, $percentage);
    }

    /**
     * getBlankVotesPercentage must throw an exception when voters is 0
     *
     * @return void
     */
    public function test_get_blank_votes_percentage_must_throw_exception_when_voters_0()
    {
        $this->expectException(DivisionByZeroException::class);

        $service = new ElectionCalculator();

        $percentage = $service->getBlankVotesPercentage(0, 100);
    }

    /**
     * getBlankVotesPercentage must throw an exception when voters is negative
     *
     * @return void
     */
    public function test_get_blank_votes_percentage_must_throw_exception_when_voters_is_negative()
    {
        $this->expectException(NegativeValueException::class);

        $service = new ElectionCalculator();

        $percentage = $service->getBlankVotesPercentage(-1, 100);
    }

    /**
     * getBlankVotesPercentage must throw an exception when votes is negative
     *
     * @return void
     */
    public function test_get_blank_votes_percentage_must_throw_exception_when_votes_is_negative()
    {
        $this->expectException(NegativeValueException::class);

        $service = new ElectionCalculator();

        $percentage = $service->getBlankVotesPercentage(100, -1);
    }

    // -------

    /**
     * getNullVotesPercentage must return a valid float
     *
     * @return void
     */
    public function test_get_null_votes_percentage_must_return_valid_float()
    {
        $service = new ElectionCalculator();

        $percentage = $service->getNullVotesPercentage(100, 100);

        $this->assertIsFloat($percentage);
        $this->assertEquals(100, $percentage);
    }

    /**
     * getNullVotesPercentage must throw an exception when voters is 0
     *
     * @return void
     */
    public function test_get_null_votes_percentage_must_throw_exception_when_voters_0()
    {
        $this->expectException(DivisionByZeroException::class);

        $service = new ElectionCalculator();

        $percentage = $service->getNullVotesPercentage(0, 100);
    }

    /**
     * getNullVotesPercentage must throw an exception when voters is negative
     *
     * @return void
     */
    public function test_get_null_votes_percentage_must_throw_exception_when_voters_is_negative()
    {
        $this->expectException(NegativeValueException::class);

        $service = new ElectionCalculator();

        $percentage = $service->getNullVotesPercentage(-1, 100);
    }

    /**
     * getNullVotesPercentage must throw an exception when votes is negative
     *
     * @return void
     */
    public function test_get_null_votes_percentage_must_throw_exception_when_votes_is_negative()
    {
        $this->expectException(NegativeValueException::class);

        $service = new ElectionCalculator();

        $percentage = $service->getNullVotesPercentage(100, -1);
    }
}
