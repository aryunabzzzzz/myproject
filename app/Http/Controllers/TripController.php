<?php

namespace App\Http\Controllers;

use App\Http\Requests\TripRequest;
use App\Models\Photo;
use App\Models\Trip;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class TripController extends Controller
{
    public function getAll(): View
    {
        $user = Auth::user();
        $trips = $user->trips;
        return view('trips', ['trips' => $trips]);
    }

    public function getOne(int $id): View
    {
        $trip_id = $id;
        $trip = Trip::find($trip_id);
        $photos = $trip->photos;

        return view('trip', ['trip' => $trip, 'photos' => $photos]);
    }

    public function add(): View
    {
        return view('addTrip');
    }

    public function postAdd(TripRequest $request): RedirectResponse
    {
        $request->validate([]);

        $data = $request->all();
        $user = Auth::user();
        $cover = $request->file('cover_path');

        $trip = $this->create($data);
        $trip->users()->attach($user);

        $trip_id = $trip->id;
        $cover_path = $this->uploadPhoto($cover, $trip_id);
        $trip->cover_path = $cover_path;
        $trip->save();

        $photos = $request->file('photos');

        foreach ($photos as $photo) {
            $this->addPhoto($photo, $trip);
        }

        return redirect("/trip/$trip_id");
    }

    public function create(array $data)
    {
        return Trip::create([
            'name' => $data['name'],
            'date' => $data['date'],
            'location' => $data['location'],
            'description' => $data['description'],
            'status' => $data['status']
        ]);
    }

    public function uploadPhoto($image, $tripId): string
    {
        $file = $image;
        $trip_id = $tripId;
        $path = $file->store("photo/trip{$trip_id}");
        return $path;
    }

    public function addPhoto($image, $trip)
    {
        $image_path = $this->uploadPhoto($image, $trip->id);

        $photo = new Photo();
        $photo->img_path = $image_path;

        $trip->photos()->save($photo);
    }

}
