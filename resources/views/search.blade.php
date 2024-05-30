@extends('layouts')
@section('title')
    Search
@endsection
@section('content')
    <h3>Results for "{{ $search }}"</h3>

    @if(!$users->count())
        <h4><br>User not found</h4>
    @endif

    @foreach($users as $user)
        <div class="card mb-3" style="width: 400px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <a class="navbar-brand mr-auto" href="{{ route('profile', ['username'=>$user->username]) }}">
                        @if($user->avatar_path)
                            <img src="{{asset("storage/$user->avatar_path")}}" class="img-fluid rounded-start" alt="...">
                        @else
                            <img src="https://miramirov.gosuslugi.ru/netcat_files/11/143/no_foto_1.png" class="img-fluid rounded-start" alt="...">
                        @endif
                    </a>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a class="navbar-brand mr-auto" href="{{ route('profile', ['username'=>$user->username]) }}">
                                {{$user->username}}
                            </a>
                        </h5>
                        <p class="card-text">{{$user->first_name}} {{$user->last_name}}</p>
                        <p class="card-text"><small class="text-body-secondary">{{$user->city}}</small></p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection
