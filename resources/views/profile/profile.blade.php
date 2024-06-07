@extends('layouts')
@section('title')
    {{$user->username}}
@endsection
@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <h1 style="text-align: justify">{{$user->username}}</h1>
            </div>
            <div class="col">
                <div class="row ">
                    <div class="col">
                        <a class="navbar-brand mr-auto" href="{{ route('followers', ['username'=>$user->username]) }}"><h6 style="text-align: center">Followers</h6></a>
                        <p style="text-align: center">{{count($user->followers)}}</p>
                    </div>
                    <div class="col">
                        <a class="navbar-brand mr-auto" href="{{ route('followings', ['username'=>$user->username]) }}"><h6 style="text-align: center">Followings</h6></a>
                        <p style="text-align: center">{{count($user->followings)}}</p>
                    </div>
                    <div class="col">
                        <a class="navbar-brand mr-auto" href="{{ route('trips', ['username'=>$user->username]) }}"><h6 style="text-align: center">Trips</h6></a>
                        <p style="text-align: center">{{count($user->trips)}}</p>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col">
                @if($user->avatar_path)
                    <img src="{{asset("storage/$user->avatar_path")}}" width="300" height="300">
                @else
                    <img src="https://miramirov.gosuslugi.ru/netcat_files/11/143/no_foto_1.png" width="300" height="300">
                @endif
            </div>

            <div class="col">
                <h3>{{$user->first_name}} {{$user->last_name}}</h3>
                <h5>gender: {{$user->gender}}</h5>
                <h5>birthday: {{$user->birthday}}</h5>
                @if($user->country)
                    <h5>country: {{$user->country}}</h5>
                @endif
                @if($user->country)
                    <h5>city: {{$user->city}}</h5>
                @endif
                @if($user->country)
                    <h5>about me: {{$user->info}}</h5>
                @endif
            </div>

            @if($user->id==Auth::user()->id)
                <div class="col">
                    <button type="button" class="btn btn-outline-primary">
                        <a class="nav-link" href="{{route('edit', ['username'=>Auth::user()->username])}}">Edit profile</a>
                    </button>
                </div>
            @elseif(Auth::user()->followings->contains($user->id))
                <div class="col">
                    <button type="button" class="btn btn-outline-primary">
                        <a class="nav-link" href="{{ route('unfollow', ['username'=>$user->username]) }}">Unfollow</a>
                    </button>
                </div>
            @else
                <div class="col">
                    <button type="button" class="btn btn-outline-primary">
                        <a class="nav-link" href="{{ route('follow', ['username'=>$user->username]) }}">Follow</a>
                    </button>
                </div>
            @endif

        </div>
    </div>


    @include('trip/attachment', ['status' => 'complete'])

@endsection
