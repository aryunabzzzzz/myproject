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
        $trip = Trip::find($id);
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
        $cover = $request->file('coverPath');

        $trip = $this->create($data);
        $trip->users()->attach($user);

        $tripId = $trip->id;
        $coverPath = $this->uploadPhoto($cover, $tripId);
        $trip->cover_path = $coverPath;
        $trip->save();

        $photos = $request->file('photos');

        foreach ($photos as $photo) {
            $this->addPhoto($photo, $trip);
        }

        return redirect("/trip/$tripId");
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
        return $image->store("photo/trip{$tripId}");
    }

    public function addPhoto($image, $trip)
    {
        $imagePath = $this->uploadPhoto($image, $trip->id);

        $photo = new Photo();
        $photo->img_path = $imagePath;

        $trip->photos()->save($photo);
    }

}
