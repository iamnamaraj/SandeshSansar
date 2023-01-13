<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\Websitemail;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class SubscriberController extends Controller
{
    public function send_email(Request $request)

    {
        $validator = \Validator::make($request->all(), [

            'email' => 'required|email',

        ]);
        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'error_message' => $validator->errors()->toArray()]);
        } else {

            $token = Hash('sha256', time());

            $subscriber = new Subscriber();

            $subscriber->email = $request->email;
            $subscriber->token = $token;

            $subscriber->save();


            // Send email
            $verification_link = url('subscriber/verify/' . $token . '/' . $request->email);

            $subject = 'Subscription Verification Mail';
            $body = 'Plese click on the following link below to verify your subscription: <br><br> ';
            $body .= '<a href="' . $verification_link . '">';
            $body .= $verification_link;
            $body .= '</a> <br><br> or ';
            $body .= '<a href="' . $verification_link . '"> Click here</a>';

            Mail::to($request->email)->send(new Websitemail($subject, $body));

            return response()->json(['code' => 1, 'success_message' => 'Please check your email to verify your subscription!!']);
        }
    }

    public function verify($token, $email)
    {
        $subscriber = Subscriber::where('token', $token)->where('email', $email)->first();

        if ($subscriber) {
            $subscriber->token = '';
            $subscriber->status = 'Active';

            $subscriber->update();

            return redirect()->back()->with('success', 'Your subscription is verified. Thank you for your subscription!!');
        } else {
            return redirect()->route('home')->with('error', 'Your subscription is faild please try again!!');
        }
    }
}
