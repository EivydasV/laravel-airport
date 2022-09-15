@extends('layouts.app')

@section('content')
    <h3>Add country</h3>
    <form action="{{route('country.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <select class="form-select " name="country">
                <option selected>select country</option>
                @foreach($countries as $country)
                    <option value="{{$country}}">{{$country}}</option>
                @endforeach
            </select>
            @error('country')
            <small class="text-danger">
                {{ $message }}
            </small>
            @enderror
        </div>
        <button class="btn btn-primary float-end" type="submit">Add</button>
    </form>
@endsection
