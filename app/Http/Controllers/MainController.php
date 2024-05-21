<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $me = Auth::user();
        $user = User::where('nickname', $nickname)->firstOrFail();
        $trips = $user->trips;
        return view('profile', ['user' => $user, 'trips' => $trips, 'me' => $me]);
    }

}
