<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ForgotPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */   
    public $name;
    public $getpassword_link;
    public function __construct($name,$getpassword_link)
    {       
        $this->name = $name;
        $this->getpassword_link = $getpassword_link;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         return $this->from('partho@wrctechnologies.com', 'Swasthya Bandhav')
        ->subject('Password Link send from Swasthya Bandhav!')
        ->view('emails.forgotpasswordmail');
    }
}
