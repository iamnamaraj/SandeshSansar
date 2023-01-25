<?php

namespace App\Http\Controllers\Front;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        $login  = Page::where('id', 1)->first();
        return view('front.login', compact('login'));
    }

    public function login_submit(Request $request)
    {
        $request->validate([
            'email' =>  ['required', 'email'],
            'password'  =>  ['required'],
        ]);

        $credential = [
            'email' => $request->email,
            'password'  =>  $request->password,
        ];

        if (Auth::guard('author')->attempt($credential)) {
            return redirect()->route('author.dashboard');
        } else {
            return redirect()->back()->with('error', 'Credential is not correct please try again with your correct credential!!');
        }
    }

    public function logout()
    {
        Auth::guard('author')->logout();
        return redirect()->route('login');
    }
}
