<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Client\Request as ClientRequest;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function contactWithAuth(Request $request)
    {
        $contactData = array(
            'name'=>$request->name,
            'message' => $request->message,
            'subject' => $request->subject,
            'email' => $request->email,
            );

        Mail::to('ariful.islam0683@gmail.com')->send(new Contact($contactData));

        return redirect()->back()->withSuccess('Submitted to authority');
    }


}
