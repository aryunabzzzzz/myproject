@extends('layouts')
@section('title')
    Trips
@endsection
@section('content')

    <h1>My Trips</h1>

    <button class="btn btn-primary rounded-pill px-3" type="button"><a class="nav-link" href="{{ route('addTrip') }}">Add new</a></button>

    @include('trip/attachment', ['status' => 'complete'])

@endsection
