<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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

        Auth::user()->update([
            'username' => $data['username'],
            'first_name' => $data['firstName'],
            'last_name' => $data['lastName'],
            'country' => $data['country'],
            'city' => $data['city'],
            'info' => $data['info']
        ]);

        $username = Auth::user()->username;

        return redirect("/$username");
    }

    public function editAvatar(string $username): View
    {
        $user = User::where('username', $username)->firstOrFail();
        return view('profile/editAvatar', ['user' => $user]);
    }

    public function postEditAvatar(Request $request): RedirectResponse
    {
//        $request->validate([]);

        $avatar = $request->file('avatarPath');
        $avatarPath = $this->uploadAvatar($avatar);

        Auth::user()->update([
            'avatar_path' => $avatarPath
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
            if($oldImage){
                Storage::delete($oldImage);
            }
            $path = $file->store("avatars/user{$userId}");
        } else {
            $path = $oldImage;
        }
        return $path;
    }

    public function deleteAvatar(string $username): RedirectResponse
    {
        $user = User::where('username', $username)->firstOrFail();
        $path = $user->avatar_path;
        if ($path){
            Storage::delete($path);
        }

        $user->avatar_path = null;
        $user->save();

        return redirect()->back();
    }

}
