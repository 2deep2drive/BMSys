<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

class EmailsController extends Controller
{
    public function sendmail()
    {
        /**
         * Replace Your email with abc@gmail.com
         */
        Mail::to('abc@gmail.com')->send(new WelcomeMail());

    }
}
