<?php

namespace App\Http\Requests\Airports;

use Illuminate\Foundation\Http\FormRequest;

class StoreAirportRequest extends FormRequest
{
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
            'title' => ['required'],
            'longitude' => ['required', 'numeric'],
            'latitude' => ['required', 'numeric'],
            'airline_id' => [''],
            'country_id' => ['']
        ];
    }
}
