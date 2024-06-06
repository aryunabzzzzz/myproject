@extends('layouts')
@section('title')
    Followers
@endsection
@section('content')

    @if(!$user->followers->count())
        <h4><br>Has not followers</h4>
    @endif

    @foreach($user->followers as $follower)
        <div class="card mb-3" style="width: 300px; height: 110px">
            <div class="row g-0">
                <div class="col-md-4">
                    <a class="navbar-brand mr-auto" href="{{ route('profile', ['username'=>$follower->username]) }}">
                        @if($follower->avatar_path)
                            <img src="{{asset("storage/$follower->avatar_path")}}" class="rounded-circle shadow-1-strong me-3" alt="..." height="100" width="100">
                        @else
                            <img src="https://miramirov.gosuslugi.ru/netcat_files/11/143/no_foto_1.png" class="rounded-circle shadow-1-strong me-3" alt="..." height="70" width="70">
                        @endif
                    </a>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a class="navbar-brand mr-auto" href="{{ route('profile', ['username'=>$follower->username]) }}">
                                {{$follower->username}}
                            </a>
                        </h5>
                        <p class="card-text">{{$follower->first_name}} {{$follower->last_name}}</p>
                        <p class="card-text"><small class="text-body-secondary">{{$follower->city}}</small></p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection
