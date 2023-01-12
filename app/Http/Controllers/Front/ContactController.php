<?php

namespace App\Http\Controllers\Front;

use App\Models\Page;
use App\Models\Admin;
use App\Mail\Websitemail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $contact  = Page::where('id', 1)->first();
        return view('front.contact', compact('contact'));
    }


    public function send_email(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);
        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'error_message' => $validator->errors()->toArray()]);
        } else {

            //sent email

            $admin_data = Admin::where('id', 1)->first();

            $subject = 'Contact Form Email';

            $message = '<br><u><b>visitor Message Details:</u></b><br><br>';
            $message .= '<b>visitor Name: </b>' . $request->name . '<br>';
            $message .= '<b>Visitor Email: </b>' . $request->email . '<br>';
            $message .= '<b>Visitor Message: </b> ' . $request->message;

            Mail::to($admin_data->email)->send(new Websitemail($subject, $message));


            return response()->json(['code' => 1, 'success_message' => 'Email is sent successfully!!']);
        }
    }
}
