@extends('layouts')
@section('title')
    {{$data->nickname}}
@endsection
@section('content')

    <h1>My Page</h1>

    <div class="container">
        <div class="row">
            <div class="col">
                <img src="{{$data->img_url}}" width="300" height="300">
            </div>

            <div class="col">
                <h3>{{$data->first_name}} {{$data->last_name}}</h3>
                <h5>{{$data->nickname}}</h5>
                <h5>{{$data->gender}}</h5>
                <h5>{{$data->birthday}}</h5>
                <h5>{{$data->country}}</h5>
                <h5>{{$data->city}}</h5>
                <h5>{{$data->info}}</h5>
            </div>
        </div>
    </div>


@endsection
