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

    public function myPage(): View
    {
        $id = Auth::id();
        $data = User::find($id);
        return view('profile', ['data' => $data]);
    }

    public function trips(): View
    {
        return view('trips');
    }
}
