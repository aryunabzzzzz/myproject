<?php

namespace App\Http\Controllers;

use App\Jobs\FollowMailJob;
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

        $follower = Auth::user();
        $data = array('follower'=>"$follower->username", 'following'=>"$following->username");
        FollowMailJob::dispatch($data, $following->email, $following->username);

        return redirect()->back();
    }

    public function unfollow(string $username): RedirectResponse
    {
        $following = User::where('username', $username)->firstOrFail();
        $followingId = $following->id;

        Auth::user()->followings()->detach($followingId);

        return redirect()->back();
    }

    public function getFollowers(string $username): View
    {
        $user = User::where('username', $username)->firstOrFail();
        return view('profile/follower', ['user' => $user]);
    }

    public function getFollowings(string $username): View
    {
        $user = User::where('username', $username)->firstOrFail();
        return view('profile/following', ['user' => $user]);
    }
}
