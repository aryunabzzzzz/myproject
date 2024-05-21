@extends('layouts')
@section('title')
    Edit profile
@endsection
@section('content')
    <h3>Edit profile</h3>

    <div class="card-body">
        <form action="{{ route('postEdit', ['nickname'=>Auth::user()->nickname]) }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <input type="text" placeholder="Nickname" id="nickname" class="form-control" name="nickname"
                       required autofocus
                       value="{{Auth::user()->nickname}}">
                @if ($errors->has('nickname'))
                    <span class="text-danger">{{ $errors->first('nickname') }}</span>
                @endif
            </div>
            <div class="form-group mb-3">
                <input type="text" placeholder="First Name" id="first_name" class="form-control" name="first_name"
                       required autofocus
                       value="{{Auth::user()->first_name}}">
                @if ($errors->has('first_name'))
                    <span class="text-danger">{{ $errors->first('first_name') }}</span>
                @endif
            </div>
            <div class="form-group mb-3">
                <input type="text" placeholder="Last Name" id="last_name" class="form-control" name="last_name"
                       required autofocus
                       value="{{Auth::user()->last_name}}">
                @if ($errors->has('last_name'))
                    <span class="text-danger">{{ $errors->first('last_name') }}</span>
                @endif
            </div>
            <div class="form-group mb-3">
                <input type="text" placeholder="Image" id="img_url" class="form-control" name="img_url"
                       autofocus
                       value="{{Auth::user()->img_url}}">
                @if ($errors->has('img_url'))
                    <span class="text-danger">{{ $errors->first('img_url') }}</span>
                @endif
            </div>
            <div class="form-group mb-3">
                <input type="text" placeholder="Country" id="country" class="form-control" name="country"
                       autofocus
                       value="{{Auth::user()->country}}">
                @if ($errors->has('country'))
                    <span class="text-danger">{{ $errors->first('country') }}</span>
                @endif
            </div>
            <div class="form-group mb-3">
                <input type="text" placeholder="City" id="city" class="form-control" name="city"
                       autofocus
                       value="{{Auth::user()->city}}">
                @if ($errors->has('city'))
                    <span class="text-danger">{{ $errors->first('city') }}</span>
                @endif
            </div>
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
                <button type="button" class="btn btn-secondary"><a class="nav-link" href="{{ route('profile', ['nickname'=>Auth::user()->nickname]) }}">Cancel</a></button>
        </form>
    </div>

@endsection
