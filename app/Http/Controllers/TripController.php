<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
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
        return view('trip/trips', ['trips' => $trips, 'username' => $username]);
    }

    public function getOne(int $id): View
    {
        $trip = Trip::find($id);
        $photos = $trip->photos;

        return view('trip/trip', ['trip' => $trip, 'photos' => $photos]);
    }

    public function add(): View
    {
        return view('trip/addTrip');
    }

    public function postAdd(TripRequest $request): RedirectResponse
    {
        $request->validate([]);

        $data = $request->all();
        $user = Auth::user();

        $trip = $this->create($data);
        $trip->users()->attach($user);

        $tripId = $trip->id;
        $cover = $request->file('coverPath');

        if ($cover) {
            $coverPath = $this->uploadPhoto($cover, $tripId);
            $trip->cover_path = $coverPath;
            $trip->save();
        }

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

    //добавить тип данных для image (File?)
    public function uploadPhoto($image, int $tripId): string
    {
        return $image->store("photo/trip{$tripId}");
    }

    //добавить тип данных для аватара (File?)
    public function addPhoto($image, Trip $trip): void
    {
        $imagePath = $this->uploadPhoto($image, $trip->id);

        $photo = new Photo();
        $photo->img_path = $imagePath;

        $trip->photos()->save($photo);
    }

    public function addComment(int $tripId, CommentRequest $request): RedirectResponse
    {
        $request->validate([]);

        $data = $request->all();

        $trip = Trip::find($tripId);

        $comment = new Comment();

        $comment->author_id = Auth::user()->id;
        $comment->comment = $data['comment'];

        $trip->comments()->save($comment);

        return redirect("/trip/$tripId");
    }

    public function edit(int $tripId): View
    {
        $trip = Trip::find($tripId);
        return view('trip/edit', ['tripId' => $tripId, 'trip' => $trip]);
    }

    public function postEdit(Request $request): RedirectResponse
    {
        //добавить реквест
//        $request->validate([]);

        $data = $request->all();
        $tripId = $data['tripId'];
        $trip = Trip::find($tripId);
        $trip->update([
            'name' => $data['name'],
            'date' => $data['date'],
            'location' => $data['location'],
            'description' => $data['description'],
            'status' => $data['status'],
        ]);

        $cover = $request->file('coverPath');

        if ($cover) {
            //добавить, чтобы старая обложка удалялась
            $coverPath = $this->uploadPhoto($cover, $tripId);
            $trip->update([
                'cover_path' => $coverPath
            ]);
        }

        return redirect("/trip/$tripId");
    }

    public function join(int $tripId): RedirectResponse
    {
        $user = Auth::user();
        $user->trips()->attach($tripId);

        return redirect()->back();
    }

}
