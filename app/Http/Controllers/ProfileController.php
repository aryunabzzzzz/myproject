<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function get(string $username): View
    {
        $user = User::where('username', $username)->firstOrFail();
        $trips = $user->trips;
        return view('profile', ['user' => $user, 'trips' => $trips]);
    }

    public function edit(string $username): View
    {
        $user = User::where('username', $username)->firstOrFail();
        return view('edit', ['user' => $user]);
    }

    public function postEdit(ProfileRequest $request): View|RedirectResponse
    {
        $request->validate([]);

        $data = $request->all();

        $image = $request->file('avatar_path');
        $image_path = $this->uploadAvatar($image);

        $user = Auth::user()->update([
            'username' => $data['username'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'avatar_path' => $image_path,
            'country' => $data['country'],
            'city' => $data['city'],
            'info' => $data['info']
        ]);

        $username = Auth::user()->username;
        return redirect("/$username");
    }

    public function uploadAvatar($image): string
    {
        $file = $image;

        $user = Auth::user();
        $user_id = $user->id;
        $oldImage = $user->avatar_path;

        if($file){
            $this->deleteAvatar($oldImage);
            $path = $file->storeAs("avatars/user{$user_id}", time().'.'.$file->getClientOriginalExtension());
        } else {
            $path = $oldImage;
        }
        return $path;
    }

    public function deleteAvatar($path)
    {
        if ($path){
            Storage::delete($path);
        }
    }

}
