<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;


class AgeCalculator implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param integer $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Get today's date
        $today = date("Y-m-d");

        // Calculate the time difference between the two dates
        $diff = date_diff(date_create($value), date_create($today));

        // Get the age in years, months and days
        //dd("your current age is ".$diff->format('%y')." Years ".$diff->format('%m')." months ".$diff->format('%d')." days");

        $age = $diff->format('%y');

        if ($age > 18) {
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'You must be 18 years or older.';
    }
}
