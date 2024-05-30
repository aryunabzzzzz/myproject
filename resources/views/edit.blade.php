@extends('layouts')
@section('title')
    Edit profile
@endsection
@section('content')
    <h3>Edit profile</h3>

    <div class="card-body">
        <form action="{{ route('postEdit', ['username'=>Auth::user()->username]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label>Username</label>
            <div class="form-group mb-3">
                <input type="text" placeholder="Username" id="username" class="form-control" name="username"
                       required autofocus
                       value="{{Auth::user()->username}}">
                @if ($errors->has('username'))
                    <span class="text-danger">{{ $errors->first('username') }}</span>
                @endif
            </div>

            <label>First Name</label>
            <div class="form-group mb-3">
                <input type="text" placeholder="First Name" id="firstName" class="form-control" name="firstName"
                       required autofocus
                       value="{{Auth::user()->first_name}}">
                @if ($errors->has('firstName'))
                    <span class="text-danger">{{ $errors->first('firstName') }}</span>
                @endif
            </div>

            <label>Last Name</label>
            <div class="form-group mb-3">
                <input type="text" placeholder="Last Name" id="lastName" class="form-control" name="lastName"
                       required autofocus
                       value="{{Auth::user()->last_name}}">
                @if ($errors->has('lastName'))
                    <span class="text-danger">{{ $errors->first('lastName') }}</span>
                @endif
            </div>

            <label>Avatar</label>
            <div class="input-group mb-3">
                <input type="file" class="form-control" id="avatarPath" name="avatarPath">
                @if ($errors->has('avatarPath'))
                    <span class="text-danger">{{ $errors->first('avatarPath') }}</span>
                @endif
            </div>

            <label>Country</label>
            <div class="form-group mb-3">
                <input type="text" placeholder="Country" id="country" class="form-control" name="country"
                       autofocus
                       value="{{Auth::user()->country}}">
                @if ($errors->has('country'))
                    <span class="text-danger">{{ $errors->first('country') }}</span>
                @endif
            </div>

            <label>City</label>
            <div class="form-group mb-3">
                <input type="text" placeholder="City" id="city" class="form-control" name="city"
                       autofocus
                       value="{{Auth::user()->city}}">
                @if ($errors->has('city'))
                    <span class="text-danger">{{ $errors->first('city') }}</span>
                @endif
            </div>

            <label>About me</label>
            <div class="form-group mb-3">
                <input type="text" placeholder="About me" id="info" class="form-control" name="info"
                       autofocus
                       value="{{Auth::user()->info}}">
                @if ($errors->has('info'))
                    <span class="text-danger">{{ $errors->first('info') }}</span>
                @endif
                @if ($errors->has('info'))
                    <span class="text-danger">{{ $errors->first('info') }}</span>
                @endif
            </div>
                <button type="submit" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-secondary"><a class="nav-link" href="{{ route('profile', ['username'=>Auth::user()->username]) }}">Cancel</a></button>
        </form>
    </div>

@endsection
