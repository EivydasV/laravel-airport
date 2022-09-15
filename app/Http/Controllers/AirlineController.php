<?php

namespace App\Http\Controllers;

use App\Http\Requests\Airlines\StoreAirlineRequest;
use App\Http\Services\CountryService;
use App\Models\Airline;
use App\Models\Country;
use Illuminate\Http\Request;

class AirlineController extends Controller
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
        $airlines = Airline::paginate(10);
        return view('web.airline.index', compact('airlines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $countries = Country::all();
        return view('web.airline.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreAirlineRequest $request)
    {
        $validated = $request->validated();
        $country = Country::where('country', $validated['country'])->firstOrfail();
        $country->airlines()->create($request->validated());

        return redirect()->route('airline.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Airline $airline
     * @return \Illuminate\Http\Response
     */
    public function show(Airline $airline)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Airline $airline
     * @return \Illuminate\Http\Response
     */
    public function edit(Airline $airline)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Airline $airline
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Airline $airline)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Airline $airline
     * @return \Illuminate\Http\Response
     */
    public function destroy(Airline $airline)
    {
        $airline->delete();
        return redirect()->back();
    }
}
