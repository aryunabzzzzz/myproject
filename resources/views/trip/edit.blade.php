@extends('layouts')
@section('title')
    Edit trip
@endsection
@section('content')
    <h3>Edit trip</h3>

    <div class="card-body">
        <form action="{{ route('postEditTrip', ['id'=>$trip->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$trip->name}}">
            </div>
            @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif

            <div class="mb-3">
                <label class="form-label">Date</label>
                <input type="text" class="form-control" id="date" name="date" value="{{$trip->date}}">
            </div>
            @if ($errors->has('date'))
                <span class="text-danger">{{ $errors->first('date') }}</span>
            @endif

            <div class="mb-3">
                <label class="form-label">Location</label>
                <input type="text" class="form-control" id="location" name="location" value="{{$trip->location}}">
            </div>
            @if ($errors->has('location'))
                <span class="text-danger">{{ $errors->first('location') }}</span>
            @endif

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" value="{{$trip->description}}"></textarea>
            </div>
            @if ($errors->has('description'))
                <span class="text-danger">{{ $errors->first('description') }}</span>
            @endif

            <div class="mb-3">
                <label class="form-label">Status</label>
                <input type="text" class="form-control" id="status" name="status" value="{{$trip->status}}">
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

            <input type="hidden" class="form-control" id="tripId" name="tripId" value="{{$trip->id}}">

            <button type="submit" class="btn btn-primary">Save changes</button>
            <button type="button" class="btn btn-secondary"><a class="nav-link" href="/trip/{{$tripId}}">Cancel</a></button>
        </form>
    </div>

@endsection
