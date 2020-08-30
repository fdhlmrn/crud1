<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\SendEmailTest;
use Mail;

class sendMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $emailaddress;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($emailaddress)
    {
        $this->emailaddress = $emailaddress;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //dd($this->contact);
        $email = new SendEmailTest();
        Mail::to($this->emailaddress)->send($email);
    }
}
