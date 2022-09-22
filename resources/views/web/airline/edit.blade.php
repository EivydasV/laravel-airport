@extends('layouts.app')

@section('content')
    <h3>Edit Airline</h3>
    <form action="{{route('airline.update', $airline->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Airline name</label>
            <input type="text" class="form-control" name="name" value="{{$airline->name}}"/>
            @error('name')
            <small class="text-danger">
                {{ $message }}
            </small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Airline Country</label>
            <select class="form-select " name="country_id">
                <option selected value="{{$airline->country->country}}">{{$airline->country->country}}</option>
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
        <button class="btn btn-primary float-end" type="submit">Edit</button>
    </form>
@endsection
