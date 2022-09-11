<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCountriesRequest;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $countries = Country::paginate(15);
        return view('web.country.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCountriesRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreCountriesRequest $request)
    {
        $validated = $request->validated();

        $countryRequest = Http::get('https://restcountries.com/v3.1/name/'. $request->country);
        if($countryRequest->failed()){
            return response()->json(['message' => $countryRequest->reason()], $countryRequest->status());
        }
        $jsonRes = $countryRequest->json();
        $country = Country::create(['country' => $validated['country'], 'code' => $jsonRes[0]['cca2']]);
        return response()->json(['message' => $country], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        //
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
        return redirect()->back();
    }
}
