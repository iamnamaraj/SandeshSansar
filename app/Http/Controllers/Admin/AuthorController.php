<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\Websitemail;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::orderBy('id', 'desc')->get();
        return view('admin.authors.index', compact('authors'));
    }

    public function create()
    {
        return view('admin.authors.create');
    }

    public function store(Request $request)
    {

        $author = new Author();

        $request->validate([
            'name'  =>  ['required'],
            'email'  =>  ['required', 'email', 'unique:authors,email'],
            'password'  =>  ['required', 'min:6'],
            'retype_password'   =>  ['required', 'same:password'],
        ]);



        if ($request->hasFile('photo')) {
            $request->validate([
                'photo'  =>  ['required', 'mimes:png,jpg,jpeg,gif'],
            ]);

            $ext = $request->file('photo')->extension();
            $final_name = 'author' . time() . '.' . $ext;

            $request->file('photo')->move(public_path('uploads/'), $final_name);

            $author->photo = $final_name;
        }

        $author->name = $request->name;
        $author->email = $request->email;
        $author->password = Hash::make($request->password);
        $author->token = '';
        $author->save();

        //send maill
        $subject = 'Account creation';
        $body = 'Dear sir/madam' . '<br>';
        $body .= '<br>Your account is created successfully as an author. Hope you will enojy by connecting with us.' . '<br>';
        $body .= '<br>please login your account by using given below credentials and do not forget to change your password to secure your account' . '<br>';
        $body .= '<br>Email = ' . $request->email . '<br>';
        $body .= 'Password = ' . $request->password . '<br>';
        $body .= '<a href ="' . route('login') . '">';
        $body .= '<br>Click on this link';
        $body .= '</a>' . '<br>';
        $body .= '<br>Thank you for choosing us, Hope you will enjoy working with us.';

        Mail::to($request->email)->send(new Websitemail($subject, $body));


        return redirect()->route('admin.author')->with('success', 'Author account is created successfully!!');
    }

    public function edit($id)
    {
        $author = Author::where('id', $id)->first();
        return view('admin.authors.edit', compact('author'));
    }

    public function update(Request $request, $id)
    {
        $author = Author::where('id', $id)->first();

        $request->validate([
            'name'  =>  ['required'],
            'email'  =>  ['required', 'email', 'unique:authors,email,' . $author->id],

        ]);

        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' =>  ['image', 'mimes:png,jpg,jpeg,gif'],
            ]);

            if ($author->photo != '') {
                unlink(public_path('uploads/' . $author->photo));
            }

            $ext = $request->file('photo')->extension();
            $final_name = 'author' . time() . '.' . $ext;

            $request->file('photo')->move(public_path('uploads/'), $final_name);

            $author->photo = $final_name;
        }

        if ($request->password != '') {
            $request->validate([
                'password'  =>  ['required', 'min:6'],
                'retype_password'   =>  ['required', 'same:password'],
            ]);

            $author->password = Hash::make($request->password);
        }

        $author->name = $request->name;
        $author->email = $request->email;
        $author->update();

        return redirect()->route('admin.author')->with('success', 'Author account is updated successfully!!');
    }

    public function delete($id)
    {
        $author = Author::where('id', $id)->first();

        $author->delete();

        if ($author->photo != '') {
            unlink(public_path('uploads/' . $author->photo));
        }

        return redirect()->back()->with('success', 'Author account is deleted successfully!!');
    }
}
