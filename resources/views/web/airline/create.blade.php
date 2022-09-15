@extends('layouts.app')

@section('content')
    <h3>Add Airline</h3>
    <form action="{{route('airline.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Airline name</label>
            <input type="text" class="form-control" name="name"/>
            @error('name')
            <small class="text-danger">
                {{ $message }}
            </small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Airline Country</label>
            <select class="form-select " name="country">
                <option selected>select country</option>
                @foreach($countries as $country)
                    <option value="{{$country->country}}">{{$country->country}}</option>
                @endforeach
            </select>
            @error('country_id')
            <small class="text-danger">
                {{ $message }}
            </small>
            @enderror
        </div>
        <button class="btn btn-primary float-end" type="submit">Add</button>
    </form>
@endsection
