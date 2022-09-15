<?php

namespace App\Rules;

use App\Http\Services\CountryService;
use Illuminate\Contracts\Validation\InvokableRule;

class Country implements InvokableRule
{
    public function __construct(private CountryService $countryService)
    {
    }
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail)
    {
        try{
            $this->countryService->getCountryByName($value);
        }catch (\Exception){
            $fail('Invalid country name');
        }

    }
}
