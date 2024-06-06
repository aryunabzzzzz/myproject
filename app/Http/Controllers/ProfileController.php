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
        return view('profile/profile', ['user' => $user, 'trips' => $trips]);
    }

    public function edit(string $username): View
    {
        $user = User::where('username', $username)->firstOrFail();
        return view('profile/edit', ['user' => $user]);
    }

    public function postEdit(ProfileRequest $request): View|RedirectResponse
    {
        $request->validate([]);

        $data = $request->all();

        $image = $request->file('avatarPath');
        $imagePath = $this->uploadAvatar($image);

        $user = Auth::user()->update([
            'username' => $data['username'],
            'first_name' => $data['firstName'],
            'last_name' => $data['lastName'],
            'avatar_path' => $imagePath,
            'country' => $data['country'],
            'city' => $data['city'],
            'info' => $data['info']
        ]);

        $username = Auth::user()->username;

        return redirect("/$username");
    }

    //добавить тип данных для аватара (File?)
    public function uploadAvatar($image): string
    {
        $file = $image;

        $user = Auth::user();
        $userId = $user->id;
        $oldImage = $user->avatar_path;

        if($file){
            $this->deleteAvatar($oldImage);
            $path = $file->store("avatars/user{$userId}");
        } else {
            $path = $oldImage;
        }
        return $path;
    }

    public function deleteAvatar(string $path): void
    {
        if ($path){
            Storage::delete($path);
        }
    }

}
