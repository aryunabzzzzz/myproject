<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\User;
use App\Models\TripUser;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class MainController extends Controller
{
    public function main(): View
    {
        return view('main');
    }

    public function myPage(): View|RedirectResponse
    {
        if(Auth::check()){
            $id = Auth::id();
            $data = User::find($id);
            $trips = $data->trips;
            return view('profile', ['data' => $data, 'trips' => $trips]);
        }
        return redirect('/main');

    }

}
