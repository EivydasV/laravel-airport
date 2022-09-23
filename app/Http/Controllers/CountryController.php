<?php

namespace App\Http\Controllers;

use App\Http\Requests\Countries\StoreCountriesRequest;
use App\Http\Services\CountryService;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function __construct(private CountryService $countryService)
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $countries = Country::paginate(10);
        return view('web.country.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $countriesAllData = $this->countryService->getAllCountries();
        $countries = collect($countriesAllData)->map(function ($country) {
            return $country['name']['common'];
        });
        return view('web.country.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCountriesRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreCountriesRequest $request)
    {
        $validated = $request->validated();
        $httpCountry = $this->countryService->getCountryByName($validated['country']);
        Country::create(['country' => $validated['country'], 'code' => $httpCountry['cca2']]);
        return redirect()->route('country.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Country $country)
    {
        return view('web.country.show', compact('country'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Country $country)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Country $country)
    {
        $country->delete();
        return redirect()->route('country.index');
    }
}
