@extends('layouts')
@section('title')
    Create a trip
@endsection
@section('content')

    <h1>Create a new trip</h1>
    <form action="{{ route('postAddTrip') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        @if ($errors->has('name'))
            <span class="text-danger">{{ $errors->first('name') }}</span>
        @endif

        <div class="mb-3">
            <label class="form-label">Date</label>
            <input type="text" class="form-control" id="date" name="date">
        </div>
        @if ($errors->has('date'))
            <span class="text-danger">{{ $errors->first('date') }}</span>
        @endif

        <div class="mb-3">
            <label class="form-label">Location</label>
            <input type="text" class="form-control" id="location" name="location">
        </div>
        @if ($errors->has('location'))
            <span class="text-danger">{{ $errors->first('location') }}</span>
        @endif

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>
        @if ($errors->has('description'))
            <span class="text-danger">{{ $errors->first('description') }}</span>
        @endif

        <div class="mb-3">
            <label class="form-label">Status</label>
            <input type="text" class="form-control" id="status" name="status">
        </div>
        @if ($errors->has('status'))
            <span class="text-danger">{{ $errors->first('status') }}</span>
        @endif

        <div class="mb-3">
            <label class="form-label">Cover photo</label>
            <input type="file" class="form-control" id="coverPath" name="coverPath">
        </div>
        @if ($errors->has('coverPath'))
            <span class="text-danger">{{ $errors->first('coverPath') }}</span>
        @endif

        <div class="mb-3">
            <label class="form-label">Photos</label>
            <input type="file" class="form-control" id="photos" name="photos[]" multiple>
        </div>
        @if ($errors->has('photos'))
            <span class="text-danger">{{ $errors->first('photos') }}</span>
        @endif

        <button type="submit" class="btn btn-success">Create</button>
    </form>



@endsection
