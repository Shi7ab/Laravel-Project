<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmail implements ShouldQueue
{
    public $backoff = 120;

    public function __construct()
    {
        //
    }

    public function tries(): int
    {
        return 3;
    }

    public function handle(UserRegistered $event): void
    {
        try {

            //throw new \Exception('Failed to send email');
            Mail::to($event->user->email)
                ->send(new WelcomeMail($event->user));
                Log::info('Email sent successfully to ' . $event->user->email);
            //code...
        } catch (\Throwable $th) {
            //throw $th;
                \Log::error('Failed to send email: ' . $th->getMessage());
                // Optionally, you can rethrow the exception to trigger the retry mechanism
                throw $th;
        }
    }
}
