@extends('layouts')
@section('title')
    {{$user->username}}
@endsection
@section('content')

    <h1>{{$user->username}}</h1>

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
                <h5>country: {{$user->country}}</h5>
                <h5>city: {{$user->city}}</h5>
                <h5>about me: {{$user->info}}</h5>
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
