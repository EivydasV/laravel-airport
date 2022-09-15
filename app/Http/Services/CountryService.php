<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Http;

class CountryService
{
    public function getAllCountries()
    {
        if (!cache('countries')) {
            $countryRequest = Http::get('https://restcountries.com/v3.1/all');
            if ($countryRequest->failed()) {
                abort($countryRequest->status(), $countryRequest->reason());
            }
            cache(['countries' => $countryRequest->json()], now()->addMonth(1));
        }


        return cache('countries');
    }

    public function getCountryByName(string $name)
    {
        $countryRequest = Http::get('https://restcountries.com/v3.1/name/' . $name);
        if ($countryRequest->failed()) {
            abort($countryRequest->status(), $countryRequest->reason());
        }
        return $countryRequest->json()[0];
    }

}
