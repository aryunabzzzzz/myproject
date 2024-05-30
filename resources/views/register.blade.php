@extends('layouts')
@section('title')
    Registration
@endsection
@section('content')
    <main class="signup-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <h3 class="card-header text-center">Create account</h3>
                        <div class="card-body">
                            <form action="{{ route('postRegister') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <label class="form-label">Username</label>
                                    <input type="text" id="username" class="form-control" name="username"
                                           required autofocus>
                                    @if ($errors->has('username'))
                                        <span class="text-danger">{{ $errors->first('username') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">First Name</label>
                                    <input type="text" id="first_name" class="form-control" name="first_name"
                                           required autofocus>
                                    @if ($errors->has('first_name'))
                                        <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" id="last_name" class="form-control" name="last_name"
                                           required autofocus>
                                    @if ($errors->has('last_name'))
                                        <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Gender</label>
                                    <input type="text" id="gender" class="form-control" name="gender"
                                           autofocus>
                                    @if ($errors->has('gender'))
                                        <span class="text-danger">{{ $errors->first('gender') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="text" id="email" class="form-control" name="email"
                                           required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" id="password" class="form-control" name="password"
                                           required>
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Password repeat</label>
                                    <input type="password" id="password_confirmation" class="form-control" name="password_confirmation"
                                           required>
                                    @if ($errors->has('password_confirmation'))
                                        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Birthday</label>
                                    <input type="date" placeholder="Birthday" id="birthday" class="form-control" name="birthday"
                                           autofocus>
                                    @if ($errors->has('birthday'))
                                        <span class="text-danger">{{ $errors->first('birthday') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Phone</label>
                                    <input type="text" id="phone" class="form-control" name="phone"
                                           autofocus>
                                    @if ($errors->has('phone'))
                                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Avatar</label>
                                    <input type="file" class="form-control" id="avatar_path" name="avatar_path">
                                    @if ($errors->has('avatar_path'))
                                        <span class="text-danger">{{ $errors->first('avatar_path') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Country</label>
                                    <input type="text" id="country" class="form-control" name="country"
                                           autofocus>
                                    @if ($errors->has('country'))
                                        <span class="text-danger">{{ $errors->first('country') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">City</label>
                                    <input type="text" id="city" class="form-control" name="city"
                                           autofocus>
                                    @if ($errors->has('city'))
                                        <span class="text-danger">{{ $errors->first('city') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">About me</label>
                                    <input type="text" id="info" class="form-control" name="info"
                                           autofocus>
                                    @if ($errors->has('info'))
                                        <span class="text-danger">{{ $errors->first('info') }}</span>
                                    @endif
                                </div>
                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-primary">Sign Up</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
