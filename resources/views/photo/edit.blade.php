@extends('layouts')
@section('title')
    Edit Photo
@endsection
@section('content')
    <img src="{{asset("storage/$photo->img_path")}}" class="img-thumbnail" alt="..." width="50%">

    <div class="card-body">
        <form action="{{ route('postEditPhoto', ['id'=>$tripId])}}" method="POST">
            @csrf

            <label>Description</label>

            <div class="form-group mb-3">
                <input type="text" id="comment" class="form-control" name="comment"
                       autofocus
                       value="{{$photo->comment}}">
                @if ($errors->has('comment'))
                    <span class="text-danger">{{ $errors->first('comment') }}</span>
                @endif
                <input type="hidden" id="photoId" class="form-control" name="photoId"
                       autofocus
                       value="{{$photo->id}}">
            </div>
            <button type="submit" class="btn btn-primary">Save changes</button>
            <button type="button" class="btn btn-secondary"><a class="nav-link" href="/trip/{{$tripId}}">Cancel</a></button>
        </form>
    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button class="btn btn-secondary me-md-2" type="button">
            <a class="nav-link" href="{{ route('deletePhoto', ['id'=>$tripId, 'photoId'=>$photo->id]) }}">Delete photo</a>
        </button>
    </div>


@endsection
