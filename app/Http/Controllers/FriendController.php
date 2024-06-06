<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class FriendController extends Controller
{
    public function follow(string $username): RedirectResponse
    {
        $following = User::where('username', $username)->firstOrFail();
        $followingId = $following->id;

        Auth::user()->followings()->attach($followingId);

        return redirect("/followMail/$following->username");
    }

    public function unfollow(string $username): RedirectResponse
    {
        $following = User::where('username', $username)->firstOrFail();
        $followingId = $following->id;

        Auth::user()->followings()->detach($followingId);

        return redirect()->back();
    }

    public function getFollowers(): View
    {
        $user = Auth::user();
        return view('profile/follower', ['user' => $user]);
    }

    public function getFollowings(): View
    {
        $user = Auth::user();
        return view('profile/following', ['user' => $user]);
    }
}
