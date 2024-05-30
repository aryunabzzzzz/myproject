<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhotoRequest;
use App\Models\Photo;
use App\Models\Trip;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PhotoController extends Controller
{
    public function add(int $id): View
    {
        $trip_id = $id;
        return view('addPhoto', ['trip_id' => $trip_id]);
    }

    public function postAdd(PhotoRequest $request): RedirectResponse
    {
        $request->validate([]);

        $data = $request->all();
        $image = $request->file('img_path');

        $trip_id = $data['trip_id'];
        $trip = Trip::find($trip_id);

        $image_path = $this->uploadPhoto($image, $trip_id);

        $photo = new Photo();
        $photo->img_path = $image_path;
        $photo->comment = $data['comment'];

        $trip->photos()->save($photo);

        return redirect("/trip/$trip_id");
    }

    public function uploadPhoto($image, $tripId): string
    {
        $file = $image;
        $trip_id = $tripId;
        $path = $file->storeAs("photo/trip{$trip_id}", time().'.'.$file->getClientOriginalExtension());
        return $path;
    }

}
