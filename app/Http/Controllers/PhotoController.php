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
        return view('addPhoto', ['tripId' => $id]);
    }

    public function postAdd(PhotoRequest $request): RedirectResponse
    {
        $request->validate([]);

        $data = $request->all();
        $image = $request->file('imgPath');

        $tripId = $data['tripId'];
        $trip = Trip::find($tripId);

        $imagePath = $this->uploadPhoto($image, $tripId);

        $photo = new Photo();
        $photo->img_path = $imagePath;
        $photo->comment = $data['comment'];

        $trip->photos()->save($photo);

        return redirect("/trip/$tripId");
    }

    public function uploadPhoto($image, $tripId): string
    {
        return $image->store("photo/trip{$tripId}");
    }

}
