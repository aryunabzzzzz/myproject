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
        $photo = $this->create($data);
//        $trip = Trip::find($data['trip_id']);
//        $trip->photos()->save($photo);


        return redirect('/trips');
    }

    public function create(array $data)
    {
        return Photo::create([
            'trip_id' => $data['trip_id'],
            'img_url' => $data['img_url'],
            'comment' => $data['comment']
        ]);
    }
}
