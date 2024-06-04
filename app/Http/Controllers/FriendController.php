<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class FriendController extends Controller
{
    public function follow(string $username)
    {
        $followerId = Auth::user()->id;
        $user = User::where('username', $username)->firstOrFail();
        $followingId = $user->id;

        Friend::create([
            'follower_id' => $followerId,
            'following_id' => $followingId,
        ]);

        return redirect()->back();
    }

    public function unfollow(string $username)
    {
        $followerId = Auth::user()->id;
        $user = User::where('username', $username)->firstOrFail();
        $followingId = $user->id;

        Auth::user()->followings()->detach($followingId);

        return redirect()->back();
    }

    public function getFollowers(): View
    {
        $user = Auth::user();

        return view('follower', ['user' => $user]);
    }

    public function getFollowings(): View
    {
        $user = Auth::user();
        return view('following', ['user' => $user]);
    }
}
