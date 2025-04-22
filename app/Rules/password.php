<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class password implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(!preg_match("#[0-9]+#",$value)) {
            $fail("Your ".$attribute." Must Contain At Least 1 Number!");
        }
        else if(!preg_match("#[A-Z]+#",$value)) {
            $fail("Your ".$attribute." Must Contain At Least 1 Capital Letter!");
        }
        else if(!preg_match("#[a-z]+#",$value)) {
            $fail("Your ".$attribute." Must Contain At Least 1 Lowercase Letter!");
        }
    }
}
