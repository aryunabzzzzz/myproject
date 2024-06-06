@extends('layouts')
@section('title')
    Followings
@endsection
@section('content')

    @if(!$user->followings->count())
        <h4><br>Has not followings</h4>
    @endif

    @foreach($user->followings as $following)
        <div class="card mb-3" style="width: 300px; height: 110px">
            <div class="row g-0">
                <div class="col-md-4">
                    <a class="navbar-brand mr-auto" href="{{ route('profile', ['username'=>$following->username]) }}">
                        @if($following->avatar_path)
                            <img src="{{asset("storage/$following->avatar_path")}}" class="rounded-circle shadow-1-strong me-3" alt="..." height="100" width="100">
                        @else
                            <img src="https://miramirov.gosuslugi.ru/netcat_files/11/143/no_foto_1.png" class="rounded-circle shadow-1-strong me-3" alt="..." height="70" width="70">
                        @endif
                    </a>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a class="navbar-brand mr-auto" href="{{ route('profile', ['username'=>$following->username]) }}">
                                {{$following->username}}
                            </a>
                        </h5>
                        <p class="card-text">{{$following->first_name}} {{$following->last_name}}</p>
                        <p class="card-text"><small class="text-body-secondary">{{$following->city}}</small></p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


@endsection
