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
        return view('auth/login');
    }

    public function postLogin(LoginRequest $request): View|RedirectResponse
    {
        $request->validate([]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $username = Auth::user()->username;
            return redirect("/$username");
        }
        return view('auth/login')->withErrors(['email'=>'Invalid email or password.']);
    }

    public function register(): View
    {
        return view('auth/register');
    }

    public function postRegister(RegistrationRequest $request): RedirectResponse
    {
        $request->validate([]);
        $data = $request->all();

        //добавить try catch
        $user = $this->create($data);
        $userId = $user->id;

        if($request->hasFile('avatarPath')){

            $avatar = $request->file('avatarPath');
            $avatarPath = $this->uploadAvatar($avatar, $userId);

            $user->avatar_path = $avatarPath;
            $user->save();
        }

        return redirect("/registrationMail/$user->username");
    }

    public function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'first_name' => $data['firstName'],
            'last_name' => $data['lastName'],
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


    //добавить тип данных для аватара (File?)
    public function uploadAvatar($avatar, int $userId): string
    {
        return $avatar->store("avatars/user{$userId}");
    }

    public function logout(): RedirectResponse
    {
        Session::flush();
        Auth::logout();
        return redirect('/login');
    }
}
