<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $resetPasswordUrl;

    public function __construct($user, $resetPasswordUrl)
    {
        $this->user = $user;
        $this->resetPasswordUrl = $resetPasswordUrl;
    }

    public function build()
    {
        return $this->view('mails.reset-password');
    }
}
