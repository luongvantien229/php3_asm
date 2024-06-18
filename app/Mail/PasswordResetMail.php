<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordResetMail extends Mailable
{
    use Queueable, SerializesModels;

    public $password;

    /**
     * Create a new message instance.
     *
     * @param  array  $mailData
     * @return void
     */
    public function __construct($mailData)
    {
        $this->password = $mailData['password'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Quên mật khẩu')
                    ->view('emails.password_reset')
                    ->with([
                        'password' => $this->password,
                    ]);
    }
}
