<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\Websitemail;
use Illuminate\Support\Facades\Mail;

class SubscriberController extends Controller
{
    public function index()
    {
        $subscribers = Subscriber::where('status', 'Active')->get();
        return view('admin.subscribers.index', compact('subscribers'));
    }

    public function mail()
    {
        return view('admin.subscribers.mail_create');
    }

    public function mail_send(Request $request)
    {
        $request->validate([
            'subject'   =>  ['required'],
            'message'   =>  ['required'],
        ]);

        $subscribers = Subscriber::where('status', 'Active')->get();

        $subject = $request->subject;
        $message = $request->message;


        foreach ($subscribers as $subscriber) {

            Mail::to($subscriber->email)->send(new Websitemail($subject, $message));
        }

        return redirect()->back()->with('success', 'Mail is sent to all subscribers!!');
    }
}
