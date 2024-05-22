<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function get(string $nickname): View
    {
        $user = User::where('nickname', $nickname)->firstOrFail();
        $trips = $user->trips;
        return view('profile', ['user' => $user, 'trips' => $trips]);
    }

    public function edit(string $nickname): View
    {
        $user = User::where('nickname', $nickname)->firstOrFail();
        return view('edit', ['user' => $user]);
    }

    public function postEdit(ProfileRequest $request): View|RedirectResponse
    {
        $request->validate([]);

        $data = $request->all();

        $user = Auth::user()->update([
            'nickname' => $data['nickname'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'img_url' => $data['img_url'],
            'country' => $data['country'],
            'city' => $data['city'],
            'info' => $data['info']
        ]);

        $nickname = Auth::user()->nickname;
        return redirect("/$nickname");
    }
}
