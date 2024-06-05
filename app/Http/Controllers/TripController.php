<?php

namespace App\Http\Controllers;

use App\Http\Requests\TripRequest;
use App\Models\Comment;
use App\Models\Photo;
use App\Models\Trip;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class TripController extends Controller
{
    public function getAll(string $username): View
    {
        $user = User::where('username', $username)->firstOrFail();
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

        if($photos){
            foreach ($photos as $photo) {
                $this->addPhoto($photo, $trip);
            }
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

    public function addComment(int $tripId, Request $request)
    {
//        $request->validate([]);
        $data = $request->all();

        $trip = Trip::find($tripId);

        $comment = new Comment();

        $comment->author_id = Auth::user()->id;
        $comment->comment = $data['comment'];

        $trip->comments()->save($comment);

        return redirect("/trip/$tripId");
    }

}
