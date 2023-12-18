<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUS;


class ContactUSController extends Controller
{
    function create() {
        return view('contact');
    }

    function send(Request $request){

        $data = $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|email',
            'subject'   => 'required|string|max:255',
            'message'   => 'required|string'
        ]);

        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactUS($data));
        return 'message sent, thanks';
    }

}
