<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailContactRequest;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function __construct()
    {
        
    }

    public function contact(MailContactRequest $request)
    {
        $name = $request->name;
        $email = $request->email;
        $message = $request->message;

        Mail::to(config('mail.to.address'))
            ->send(new ContactMail($name, $email, $message));

        return $this->sendData(['message' => 'E-mail enviado com sucesso!']);

    } 
}
