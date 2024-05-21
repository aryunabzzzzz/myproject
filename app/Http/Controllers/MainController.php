<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MainController extends Controller
{
    public function main(): View
    {
        return view('main');
    }

    public function profile(string $nickname): View
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

    public function postEdit(Request $request): View|RedirectResponse
    {
        $request->validate([
            'nickname' => 'required|unique:users',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'img_url' => 'nullable|string',
            'country' => 'nullable|string',
            'city' => 'nullable|string',
            'info' => 'nullable|string|max:255'
        ]);

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

    public function search(): View
    {
        return view('search');
    }

}
