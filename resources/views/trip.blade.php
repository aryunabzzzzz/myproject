@extends('layouts')
@section('title')
    Trip
@endsection
@section('content')

    <h1>{{$trip->name}}</h1>
    <button class="btn btn-primary rounded-pill px-3" type="button"><a class="nav-link" href="{{ route('addPhoto') }}">Add photo</a></button>

    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading fw-normal lh-1">{{$trip->location}} <span class="text-body-secondary">{{$trip->date}}</span></h2>
            <p class="lead">{{$trip->description}}</p>
        </div>
        <div class="col-md-5 order-md-1">
            <img src="{{$trip->photo}}" width="500" height="500">
        </div>
    </div>

    <div class="container px-4 py-5">
        <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
            @foreach($photos as $photo)
                <div class="card" style="...">
                    <img src="{{$photo->img_url}}" class="card-img-top" alt="...">
                    <div class="card-body">
                    <p class="card-text">{{$photo->comment}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


@endsection
