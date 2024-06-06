<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function followMail(string $username): RedirectResponse
    {
        $follower = Auth::user();
        $following = User::where('username', $username)->firstOrFail();

        $data = array('follower'=>"$follower->username", 'following'=>"$following->username");

        Mail::send('mail/follow', $data, function($message) use ($following, $follower) {
            $message->to($following->email, $following->username)->subject('You have a new Follower!');
            $message->from('myjourney1109@gmail.com','MyJourney');
        });
        return redirect("/$following->username");
    }

    public function registrationMail(string $username): RedirectResponse
    {
        $user = User::where('username',$username)->first();
        $data = array('name'=>$username);

        Mail::send('mail/registration', $data, function($message) use ($user) {
            $message->to($user->email, $user->username)->subject('Welcome to MyJourney!');
            $message->from('myjourney1109@gmail.com','MyJourney');
        });

        return redirect('/login');
    }
}
