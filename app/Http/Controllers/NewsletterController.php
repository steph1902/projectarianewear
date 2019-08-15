<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Newsletter;

class NewsletterController extends Controller
{
    //
    public function store(Request $request)
    {
        $email = $request->input('email');

        if(empty($email))
        {
            return redirect('/')->with('failure', 'Please enter your email ');
        }
        // dd($email);
        if ( ! Newsletter::isSubscribed($email) )
        {
            Newsletter::subscribePending($email);
            return redirect('/')->with('success', 'Thanks For Subscribe');
        }
        return redirect('/')->with('failure', 'Sorry! You have already subscribed ');

    }
}
