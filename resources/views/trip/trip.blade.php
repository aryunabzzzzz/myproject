@extends('layouts')
@section('title')
    Trip
@endsection
@section('content')

    <h1>{{$trip->name}}</h1>
    @if($trip->users->contains(Auth::user()->id))
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn btn-primary rounded-pill px-3" type="button">
                <a class="nav-link" href="/trip/{{$trip->id}}/addPhoto">Add photo</a>
            </button>
            <button class="btn btn-secondary rounded-pill px-3" type="button">
                <a class="nav-link" href="{{ route('editTrip', ['id'=>$trip->id]) }}">Edit trip</a>
            </button>
            <button class="btn btn-secondary rounded-pill px-3" type="button">
                <a class="nav-link" href="#">Delete trip</a>
            </button>
        </div>
    @endif

    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading fw-normal lh-1">{{$trip->location}} <span class="text-body-secondary">{{$trip->date}}</span></h2>
            <p class="lead">{{$trip->description}}</p>
        </div>
        <div class="col-md-5 order-md-1">
            <img src="{{asset("storage/$trip->cover_path")}}" class="img-thumbnail" width="500" height="500">
        </div>
    </div>


    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                @foreach($photos as $photo)
                    <div class="col">
                        <div class="card shadow-sm">
                            <img src="{{asset("storage/$photo->img_path")}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text">{{$photo->comment}}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-primary">View</button>
                                        @if($trip->users->contains(Auth::user()->id))
                                            <button type="button" class="btn btn-sm btn-outline-primary">
                                                <a class="navbar-brand mr-auto" href="{{ route('editPhoto', ['id'=>$trip->id, 'photoId'=>$photo->id]) }}">
                                                    Edit
                                                </a>
                                            </button>
                                        @endif

                                    </div>
                                    <small class="text-body-secondary">{{$photo->created_at}}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    @include('trip/comments', ['status' => 'complete'])


@endsection
