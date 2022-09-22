@extends('layouts.app')

@section('content')
    <h3>Edit Airport</h3>
    <form action="{{route('airport.update', $airport->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Airport name</label>
            <input type="text" class="form-control" name="title" value="{{$airport->title}}"/>
            @error('title')
            <small class="text-danger">
                {{ $message }}
            </small>
            @enderror
        </div>
        <div class="mb-3">
            <select class="form-select" name="country">
                <option selected value="{{$airport->country->country}}">{{$airport->country->country}}</option>
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
        <input type="text" hidden name="latitude" id="latitude" value="{{$airport->latitude}}">
        <input type="text" hidden name="longitude" id="longitude" value="{{$airport->longitude}}">
        <div id="map" style="height: 400px"></div>

        <button class="btn btn-primary float-end" type="submit">Edit</button>

    </form>
    <script type="text/javascript">
        let map;
        function initMap() {
            const latitude = document.getElementById("latitude")
            const longitude = document.getElementById("longitude")
            const defaultCord = { lat: +latitude.value, lng: +longitude.value };
            console.log(defaultCord)
            map = new google.maps.Map(document.getElementById("map"), {
                center: defaultCord,
                zoom: 4,
                scrollwheel: true,
            });

            let marker = new google.maps.Marker({
                position: defaultCord,
                map: map,
                draggable: true
            });
            google.maps.event.addListener(marker,'position_changed',
                function (){
                    const lat = marker.position.lat()
                    const lng = marker.position.lng()
                    latitude.value = lat
                    longitude.value = lng
                })
            google.maps.event.addListener(map,'click',
                function (event){
                    pos = event.latLng
                    marker.setPosition(pos)
                })
        }
    </script>

    <script type="text/javascript"
            src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initMap"></script>
@endsection
