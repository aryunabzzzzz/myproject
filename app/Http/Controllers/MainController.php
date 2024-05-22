<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MainController extends Controller
{
    public function main(): View
    {
        return view('main');
    }

    public function search(Request $request): View
    {
        $search = $request->get('search');

        if (empty($search)) {
            $user = Auth::user();
            $trips = $user->trips;
            return view('profile', ['user' => $user, 'trips' => $trips]);
        }

        $users = User::where('nickname', 'like', $search . '%')->get();
        return view('search', ['search' => $search], ['users' => $users]);
    }

}
