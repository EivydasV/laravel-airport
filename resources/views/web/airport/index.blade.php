@extends('layouts.app')

@section('content')
    <h3>Airports</h3>
    <div class="container d-flex justify-content-end">
        <a class="btn btn-primary" href="{{route('airport.create')}}">Add Airport</a>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">title</th>
            <th scope="col">country</th>
            <th scope="col">latitude</th>
            <th scope="col">longitude</th>
            <th scope="col">actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($airports as $airport)
            <tr>
                <th scope="row">{{$airport->id}}</th>
                <td>{{$airport->country->id}}</td>
                <td>{{$airport->latitude}}</td>
                <td>{{$airport->longitude}}</td>
                <td>
                    <form method="POST" action="{{route('$airport.destroy', $airport->id)}}">
                        @method('DELETE')
                        @csrf
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-trash-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                </svg>
                            </button>
                        </div>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{$airports->links()}}
    </div>
@endsection
