<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReferredUserCreatedEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $referrer;
    public function build()
    {
        return $this->view('emails.user_created_under_you')
                    ->subject('Referred User Created Email');
    }
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$referrer)
    {
        $this->user = $user;
        $this->referrer = $referrer;
    }
}
