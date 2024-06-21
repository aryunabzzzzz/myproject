@extends('layouts')
@section('title')
    Edit avatar
@endsection
@section('content')
    <h3>Current avatar</h3>

    <div class="col mb-3">
        @if($user->avatar_path)
            <img src="{{asset("storage/$user->avatar_path")}}" width="300" height="300">
        @else
            <img src="https://miramirov.gosuslugi.ru/netcat_files/11/143/no_foto_1.png" width="300" height="300">
        @endif
    </div>

    <div class="card-body">
        <form action="{{ route('postEditAvatar', ['username'=>Auth::user()->username]) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label>Upload new avatar</label>
            <div class="input-group mb-3">
                <input type="file" class="form-control" id="avatarPath" name="avatarPath">
                @if ($errors->has('avatarPath'))
                    <span class="text-danger">{{ $errors->first('avatarPath') }}</span>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Save changes</button>
            <button type="button" class="btn btn-secondary">
                <a class="nav-link" href="{{ route('profile', ['username'=>Auth::user()->username]) }}">Cancel</a>
            </button>
        </form>
    </div>

@endsection
