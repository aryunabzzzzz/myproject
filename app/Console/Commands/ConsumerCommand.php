<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Services\RabbitMQService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class ConsumerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:consumer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $rabbit = function ($data) {
            $followingId = $data['followingId'];
            $followerId = $data['followerId'];

            $following = User::find($followingId);
            $follower = User::find($followerId);

            $data = ['follower'=>$follower->username, 'following'=>$following->username];

            Mail::send('mail/follow', $data, function($message) use ($following) {
                $message->to($following->email, $following->username)->subject('You have a new Follower!');
                $message->from('myjourney1109@gmail.com','MyJourney');
            });
        };

        $rabbitConsumer = new RabbitMQService('follower');
        $rabbitConsumer->consume($rabbit);

    }
}
