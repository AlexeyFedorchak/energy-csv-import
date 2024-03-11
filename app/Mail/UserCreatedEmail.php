<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserCreatedEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public function build()
    {
        return $this->view('emails.account_created')
                    ->subject('User Created Email');
    }
    
    public function __construct($user)
    {
        $this->user = $user;
    }
}