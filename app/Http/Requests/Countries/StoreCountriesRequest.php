<?php

namespace App\Http\Requests\Countries;

use App\Http\Services\CountryService;
use App\Rules\Country;
use Illuminate\Foundation\Http\FormRequest;

class StoreCountriesRequest extends FormRequest
{
    public function __construct(private CountryService $countryService)
    {
        parent::__construct();
    }
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'country' => ['required', 'unique:countries', new Country($this->countryService)]
        ];
    }
}
