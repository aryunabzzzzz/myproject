@extends('layouts')
@section('title')
    {{$data->nickname}}
@endsection
@section('content')

    <h1>{{$data->nickname}}</h1>

    <div class="container">
        <div class="row">
            <div class="col">
                <img src="{{$data->img_url}}" width="300" height="300">
            </div>

            <div class="col">
                <h3>{{$data->first_name}} {{$data->last_name}}</h3>
                <h5>gender: {{$data->gender}}</h5>
                <h5>birthday: {{$data->birthday}}</h5>
                <h5>country: {{$data->country}}</h5>
                <h5>city: {{$data->city}}</h5>
                <h5>about me: {{$data->info}}</h5>
            </div>
        </div>
    </div>

    <div class="container px-4 py-5">
        <h2 class="pb-2 border-bottom">Trips</h2>

        <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">

            @foreach($trips as $trip)

                <div class="col">
                    <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('{{$trip->photo}}');">
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                            <form method="POST" action="{{ route('trip') }}">
                                @csrf
                                <input type="hidden" name="trip_id" value="{{$trip->id}}">
                                <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold"><button type="submit" class="btn btn-outline-light">{{$trip->name}}</button></h3>
                            </form>
                            <ul class="d-flex list-unstyled mt-auto">

                                <li class="d-flex align-items-center me-3">
                                    <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#geo-fill"></use></svg>
                                    <small>{{$trip->location}}</small>
                                </li>
                                <li class="d-flex align-items-center">
                                    <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#calendar3"></use></svg>
                                    <small>{{$trip->date}}</small>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
    </div>


@endsection
