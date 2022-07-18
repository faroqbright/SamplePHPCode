<?php

namespace App\Services;

use App\Mail\EmailVerificationMail;
use App\Http\Controllers\Controller;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\Mail;

class MailService extends Controller
{
    public static function sendEmailVerificationMail($email, $email_verification_code)
    {
        $data = [
            'email_verification_code' => $email_verification_code
        ];

        Mail::to($email)->send(new EmailVerificationMail($data));
    }

    public static function sendForgotPasswordMail($email, $temporary_password)
    {
        $data = [
            'temporary_password' => $temporary_password,
            'email' => $email
        ];

        return Mail::to($email)->send(new ForgotPasswordMail($data));
    }
}
