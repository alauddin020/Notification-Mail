<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailTest extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     private $demo;
     public function __construct($demo)
    {
        $this->demo = $demo;
    }
 
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->view('email.test')
                ->subject("Forgot Password Reset")
                ->with([
                    'name' => $this->demo->name,
                    'url' => url('/')
                ]);
        // return $this->from('inforecovery@gmail.com')
        //             ->view('email.test');
    }
}
