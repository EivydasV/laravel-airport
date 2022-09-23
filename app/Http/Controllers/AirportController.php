<?php

namespace App\Http\Controllers;

use App\Http\Requests\Airports\StoreAirportRequest;
use App\Models\Airport;
use App\Models\Country;
use Illuminate\Http\Request;

class AirportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $airports = Airport::paginate(15);
        return view('web.airport.index', compact('airports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('web.airport.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreAirportRequest $request)
    {

        $validated = $request->validated();
        $country = Country::where('country', $validated['country'])->firstOrfail();
        $country->airport()->create($request->validated());
        return redirect()->route('airport.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Airport  $airport
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Airport $airport)
    {
        return view('web.airport.show', compact('airport'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Airport  $airport
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Airport $airport)
    {
        $countries = Country::all();
        return view('web.airport.edit', compact('airport', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Airport  $airport
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Airport $airport)
    {
        $airport->update($request->all());
        return redirect()->route('airport.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Airport  $airport
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Airport $airport)
    {
        $airport->delete();
        return redirect()->route('airport.index');
    }
}
