<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegistrationEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $activation_link;
    public $name;
    public function __construct($activation_link,$name)
    {
        //
        $this->activation_link = $activation_link;
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->from('partho@wrctechnologies.com', 'Swasthya Bandhav')
        ->subject('Registration Email!')
        ->view('emails.registration');
    }
}
