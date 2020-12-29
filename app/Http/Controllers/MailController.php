<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SignupEmail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
   static public function sendEmail($to,$name){
    $veficationCode=rand(1000,9999);
    session()->put('code',$veficationCode);
        $data = [
            'name' => $name,
            'verification_code' => $veficationCode
        ];

        Mail::to($to)->send(new SignupEmail($data));
    }
}
