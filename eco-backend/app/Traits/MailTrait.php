<?php

namespace App\Traits;

use Illuminate\Support\Facades\Mail;

trait MailTrait
{
    /**
     * @param int $code
     * @param string $email
     * @return void
     */
    public function sendAuthCodeMail(int $code, string $email): void
    {
        Mail::send('emails.code', ['code' => $code], function ($message) use ($email) {
            $message->to($email);
            $message->subject(__('Email verification'));
        });
    }

    /**
     * @param string $token
     * @param string $email
     * @return void
     */
    public function sendAuthTokenMail(string $token, string $email): void
    {
        Mail::send('emails.token', ['token' => $token], function ($message) use ($email) {
            $message->to($email);
            $message->subject(__('Email verification'));
        });
    }
}
