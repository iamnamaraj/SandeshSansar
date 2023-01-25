<?php

namespace App\Http\Controllers\Author;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('author.profile');
    }

    public function profile_update(Request $request)
    {
        $author_data = Author::where('email', Auth::guard('author')->user()->email)->first();

        $request->validate([
            'name'  =>  ['required'],
            'email' => ['required', 'email', 'unique:authors,email,' . $author_data->id],
        ]);

        if ($request->password != '') {
            $request->validate([
                'password'  =>  ['required', 'min:6'],
                'retype_password'   =>  ['required', 'same:password'],
            ]);

            $author_data->password = Hash::make($request->password);
        }

        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' =>  ['image', 'mimes:png,jpg,jpeg,gif'],
            ]);
            if ($author_data->photo != '') {
                unlink(public_path('uploads/' . $author_data->photo));
            }

            $ext = $request->file('photo')->extension();
            $final_name = 'author' . time() . '.' . $ext;

            $request->file('photo')->move(public_path('uploads/'), $final_name);

            $author_data->photo = $final_name;
        }

        $author_data->name = $request->name;
        $author_data->email = $request->email;
        $author_data->update();

        return redirect()->back()->with('success', 'Profile ionformation is updated successfully!!');
    }
}
