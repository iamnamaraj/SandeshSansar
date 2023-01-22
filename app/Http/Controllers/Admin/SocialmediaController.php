<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SocialmediaController extends Controller
{
    public function index()
    {
        $medias = SocialMedia::get();
        return view('admin.social_media.index', compact('medias'));
    }

    public function create()
    {
        return view('admin.social_media.cretate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  =>  ['required'],
            'icon'  =>  ['required'],
            'url'  =>  ['required'],
        ]);

        $media = new SocialMedia();

        $media->name = $request->name;
        $media->icon = $request->icon;
        $media->url = $request->url;

        $media->save();

        return redirect()->route('admin.social_media')->with('success', 'Social media is created successfully!!');
    }

    public function edit($id)
    {
        $media = SocialMedia::where('id', $id)->first();
        return view('admin.social_media.edit', compact('media'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'  =>  ['required'],
            'icon'  =>  ['required'],
            'url'  =>  ['required'],
        ]);

        $media = SocialMedia::where('id', $id)->first();

        $media->name = $request->name;
        $media->icon = $request->icon;
        $media->url = $request->url;

        $media->update();

        return redirect()->route('admin.social_media')->with('success', 'Social media is updated successfully!!');
    }

    public function delete($id)
    {
        $media = SocialMedia::where('id', $id)->first();

        $media->delete();

        return redirect()->back()->with('success', 'Social media is deleted successfully!!');
    }
}
