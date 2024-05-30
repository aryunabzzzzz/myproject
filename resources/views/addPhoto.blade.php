@extends('layouts')
@section('title')
    Add photos
@endsection
@section('content')

    <h1>Add photo</h1>
    <form action="{{ route('postAddPhoto') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" class="form-control" id="img_path" name="img_path">
        </div>
        @if ($errors->has('img_path'))
            <span class="text-danger">{{ $errors->first('img_path') }}</span>
        @endif
        <div class="mb-3">
            <label class="form-label">Comment</label>
            <input type="text" class="form-control" id="comment" name="comment">
        </div>
        @if ($errors->has('comment'))
            <span class="text-danger">{{ $errors->first('comment') }}</span>
        @endif
        <div class="mb-3">
            <input type="hidden" class="form-control" id="trip_id" name="trip_id" value="{{$trip_id}}">
        </div>

        <button type="submit" class="btn btn-success">Add photo</button>
    </form>


@endsection
