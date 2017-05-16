<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactSendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $sendmessage;
    public function __construct($sendmessage)
    {
        $this->sendmessage = $sendmessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('partho@wrctechnologies.com', 'Swasthya Bandhav')
        ->subject('Reply from Swasthya Bandhav!')
        ->view('emails.contactsendmail');
    }
}
