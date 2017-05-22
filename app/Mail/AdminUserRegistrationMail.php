<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminUserRegistrationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $name;
    public $adminname;
    public $rolename;
    public $login_email;
    public $login_password;
    public function __construct($name,$adminname,$rolename,$login_email,$login_password)
    {
        $this->name = $name;
        $this->adminname = $adminname;
        $this->rolename = $rolename;
        $this->login_email = $login_email;
        $this->login_password = $login_password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('partho@wrctechnologies.com', 'Swasthya Bandhav')
        ->subject('Registration from Swasthya Bandhav!')
        ->view('emails.adminuserregistrationdmail');
    }
}
