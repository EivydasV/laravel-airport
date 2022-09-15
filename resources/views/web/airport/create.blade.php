@extends('layouts.app')

@section('content')
    <h3>Add country</h3>
    <form action="{{route('airport.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <select class="form-select " name="country">
                <option selected>select country</option>
                @foreach($countries as $country)
                    <option value="{{$country->country}}">{{$country->country}}</option>
                @endforeach
            </select>
            @error('country')
            <small class="text-danger">
                {{ $message }}
            </small>
            @enderror
        </div>
        <div id="map" style="height: 400px"></div>

        <button class="btn btn-primary float-end" type="submit">Add</button>

    </form>
    <script type="text/javascript">
        function initMap() {
            const myLatLng = { lat: 0, lng: 0 };
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 5,
                center: myLatLng,
            });

            new google.maps.Marker({
                position: myLatLng,
                map,
                title: "Hello Rajkot!",
            });
        }

        window.initMap = initMap;
    </script>

    <script type="text/javascript"
            src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initMap" ></script>
@endsection
