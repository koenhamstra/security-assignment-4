<?php

namespace Tests\Unit;

use App\Rules\AgeCalculator;
use PHPUnit\Framework\TestCase;

class ValidationTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function test_CalculateAgeAbove18YearOld()
    {
        //GIVEN
        $ageCalc = new AgeCalculator();
        $today = date("Y-m-d");
        $dateOfBirth = '25-03-1989';

        //THEN
        $result = $ageCalc->passes($today, $dateOfBirth);

        //WHEN
        self::assertEquals(true, $result, "You must be 18 years or older.");
    }

    public function test_CalculateAgeBellow18YearsOld()
    {
        //GIVEN
        $ageCalc = new AgeCalculator();
        $today = date("Y-m-d");
        $dateOfBirth = '01-10-2005';

        //THEN
        $result = $ageCalc->passes($today, $dateOfBirth);

        //WHEN
        self::assertEquals(false, $result, "You must be 18 years or older.");
    }
}
