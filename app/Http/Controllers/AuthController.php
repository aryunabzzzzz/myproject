<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function login(): View
    {
        return view('login');
    }

    public function postLogin(Request $request): View|RedirectResponse
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('/myPage');
        }
        return view('login');
    }

    public function register(): View
    {
        return view('register');
    }

    public function postRegister(Request $request): RedirectResponse
    {
        $request->validate([
            'nickname' => 'required',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'gender' => 'nullable|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'birthday' => 'required',
            'phone' => 'nullable|string',
            'img_url' => 'nullable|string',
            'country' => 'nullable|string',
            'city' => 'nullable|string',
            'info' => 'nullable|string|max:255'
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect('/login');
    }

    public function create(array $data)
    {
        return User::create([
            'nickname' => $data['nickname'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'gender' => $data['gender'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'birthday' => $data['birthday'],
            'phone' => $data['phone'],
            'img_url' => $data['img_url'],
            'country' => $data['country'],
            'city' => $data['city'],
            'info' => $data['info']
        ]);
    }

    public function main(): View
    {
        return view('main');
    }

    public function myPage(): View
    {
        return view('myPage');
    }

    public function trips(): View
    {
        return view('trips');
    }

    public function logout(): RedirectResponse
    {
        Session::flush();
        Auth::logout();
        return redirect('/login');
    }
}
