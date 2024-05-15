<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\TripUser;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class TripController extends Controller
{
    public function getAll(): View
    {
        $id = Auth::id();
        $users = User::find($id);
        $trips = $users->trips;
        return view('trips', ['trips' => $trips]);
    }

    public function getOne(Request $request): View
    {
        $trip_id = $request->get('trip_id');
        $trip = Trip::find($trip_id);
        $photos = $trip->photos;

        return view('trip', ['trip' => $trip, 'photos' => $photos]);
    }

    public function add(): View
    {
        return view('addTrip');
    }

    public function postAdd(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|string',
            'location' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|string',
            'photo' => 'required|string',
        ]);

        $data = $request->all();
        $trip = $this->create($data);
        $user = User::find(Auth::id());
        $trip->users()->attach($user);


        return redirect('/trips');
    }

    public function create(array $data)
    {
        return Trip::create([
            'name' => $data['name'],
            'date' => $data['date'],
            'location' => $data['location'],
            'description' => $data['description'],
            'status' => $data['status'],
            'photo' => $data['photo']
        ]);
    }

}