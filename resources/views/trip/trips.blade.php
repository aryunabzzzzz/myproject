@extends('layouts')
@section('title')
    Trips
@endsection
@section('content')

    <h1>My Trips</h1>

    @if($user->username == Auth::user()->username)
        <button class="btn btn-primary rounded-pill px-3" type="button"><a class="nav-link" href="{{ route('addTrip') }}">Add new</a></button>
    @endif

    @include('trip/attachment', ['status' => 'complete'])

@endsection
