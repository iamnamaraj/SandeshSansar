<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LiveChannel;
use Illuminate\Http\Request;

class LiveChannelController extends Controller
{
    public function index()
    {
        $lives = LiveChannel::orderBy('id', 'desc')->get();
        return view('admin.lives.index', compact('lives'));
    }

    public function create()
    {

        return view('admin.lives.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'heading'   =>  ['required'],
            'video_id'   =>  ['required'],
        ]);

        $live = new LiveChannel();

        $live->heading = $request->heading;
        $live->video_id = $request->video_id;

        $live->save();

        return redirect()->route('admin.live')->with('success', 'Live is created successfully!!');
    }

    public function edit($id)
    {
        $live = LiveChannel::where('id', $id)->first();
        return view('admin.lives.edit', compact('live'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'heading'   =>  ['required'],
            'video_id'   =>  ['required'],
        ]);

        $live = LiveChannel::where('id', $id)->first();

        $live->heading = $request->heading;
        $live->video_id = $request->video_id;

        $live->update();

        return redirect()->route('admin.live')->with('success', 'Live is updated successfully!!');
    }

    public function delete($id)
    {
        $live = LiveChannel::where('id', $id)->first();

        $live->delete();

        return redirect()->back()->with('success', 'Live is deleted successfully!!');
    }
}
