<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhotoRequest;
use App\Models\Photo;
use App\Models\Trip;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PhotoController extends Controller
{
    public function add(int $id): View
    {
        return view('photo/addPhoto', ['tripId' => $id]);
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

    //добавить тип данных для аватара (File?)
    public function uploadPhoto($image, int $tripId): string
    {
        return $image->store("photo/trip{$tripId}");
    }

    public function edit(int $tripId, int $photoId): View
    {
        $photo = Photo::find($photoId);
        return view('photo/edit', ['tripId' => $tripId, 'photo' => $photo]);
    }

    public function postEdit(Request $request): RedirectResponse
    {
        //добавить реквест
//        $request->validate([]);

        $data = $request->all();
        $photo = Photo::find($data['photoId']);
        $photo->update([
            'comment' => $data['comment'],
        ]);

        $tripId = $photo->trip->id;

        return redirect("/trip/$tripId");
    }

    public function delete(int $tripId, int $photoId): RedirectResponse
    {
        $photo = Photo::find($photoId);
        Storage::delete("$photo->img_path");

        $photo::destroy($photoId);

        return redirect("/trip/$tripId");
    }

}
