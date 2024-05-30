<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
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

    public function postLogin(LoginRequest $request): View|RedirectResponse
    {
        $request->validate([]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $username = Auth::user()->username;
            return redirect("/$username");
        }
        return view('login')->withErrors(['email'=>'Invalid email or password.']);
    }

    public function register(): View
    {
        return view('register');
    }

    public function postRegister(RegistrationRequest $request): RedirectResponse
    {
        $request->validate([]);

        $data = $request->all();
        $user = $this->create($data);
        $user_id = $user->id;

        $avatar = $request->file('avatar_path');
        $avatar_path = $this->uploadAvatar($avatar, $user_id);

        $user->avatar_path = $avatar_path;
        $user->save();

        return redirect('/login');
    }

    public function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'gender' => $data['gender'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'birthday' => $data['birthday'],
            'phone' => $data['phone'],
            'country' => $data['country'],
            'city' => $data['city'],
            'info' => $data['info']
        ]);
    }

    public function uploadAvatar($avatar, $user_id): string
    {
        $path = $avatar->storeAs("avatars/user{$user_id}", time().'.'.$avatar->getClientOriginalExtension());
        return $path;
    }

    public function logout(): RedirectResponse
    {
        Session::flush();
        Auth::logout();
        return redirect('/login');
    }
}
