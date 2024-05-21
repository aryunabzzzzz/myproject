<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Trip;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PhotoController extends Controller
{
    public function add(int $id): View
    {
        $trip_id = $id;
        return view('addPhoto', ['trip_id' => $trip_id]);
    }

    public function postAdd(Request $request): RedirectResponse
    {
        $request->validate([
            'img_url' => 'required|string',
            'comment' => 'required|string'
        ]);

        $data = $request->all();

        $photo = new Photo();
        $photo->img_url = $data['img_url'];
        $photo->comment = $data['comment'];
        $trip_id = $data['trip_id'];
        $trip = Trip::find($trip_id);
        $trip->photos()->save($photo);

        return redirect("/trip/$trip_id");
    }

}
