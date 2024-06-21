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

                @if($user->id==Auth::user()->id)
                        <div class="col">
                            <button type="button" class="btn">
                                <a class="nav-link" href="{{route('editAvatar', ['username'=>Auth::user()->username])}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                                    </svg>
                                </a>
                            </button>
                            <button type="button" class="btn">
                                <a class="nav-link" href="{{route('deleteAvatar', ['username'=>Auth::user()->username])}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                    </svg>
                                </a>
                            </button>
                        </div>
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
