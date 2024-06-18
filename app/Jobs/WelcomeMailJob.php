<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class WelcomeMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected array $data;
    protected string $email;
    protected string $username;

    public function __construct(array $data, string $email, string $username)
    {
        $this->data = $data;
        $this->email = $email;
        $this->username = $username;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::send('mail/registration', $this->data, function($message) {
            $message->to($this->email, $this->username)->subject('Welcome to MyJourney!');
            $message->from('myjourney1109@gmail.com','MyJourney');
        });
    }
}
