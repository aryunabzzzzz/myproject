<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class MainController extends Controller
{
    public function main(): View
    {
        return view('main');
    }

    public function search(): View
    {
        return view('search');
    }

}
