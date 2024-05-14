@extends('layouts')
@section('title')
    Add photos
@endsection
@section('content')

    <h1>Add photo</h1>
    <form action="{{ route('postAddPhoto') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="text" class="form-control" id="img_url" name="img_url">
        </div>
        @if ($errors->has('img_url'))
            <span class="text-danger">{{ $errors->first('img_url') }}</span>
        @endif
        <div class="mb-3">
            <label class="form-label">Comment</label>
            <input type="text" class="form-control" id="comment" name="comment">
        </div>
        @if ($errors->has('comment'))
            <span class="text-danger">{{ $errors->first('comment') }}</span>
        @endif
        <div class="mb-3">
            <label class="form-label">Trip_id</label>
            <input type="text" class="form-control" id="trip_id" name="trip_id">
        </div>
        @if ($errors->has('trip_id'))
            <span class="text-danger">{{ $errors->first('trip_id') }}</span>
        @endif


        <button type="submit" class="btn btn-success">Add photo</button>
    </form>


@endsection
