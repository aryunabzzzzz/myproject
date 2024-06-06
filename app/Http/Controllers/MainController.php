<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MainController extends Controller
{
    public function main(): View
    {
        return view('main');
    }

    public function search(Request $request): View|RedirectResponse
    {
        $search = $request->get('search');

        if (empty($search)) {
            return redirect()->back();
        }

        $users = User::where('username', 'like', $search . '%')->get();
        return view('search', ['search' => $search], ['users' => $users]);
    }

}
