<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OnlinePoll;
use Illuminate\Http\Request;

class PollController extends Controller
{
    public function index()
    {
        $polls = OnlinePoll::orderBy('id', 'desc')->get();
        return view('admin.polls.index', compact('polls'));
    }

    public function create()
    {
        return view('admin.polls.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'question'  =>   ['required'],
        ]);

        $poll = new OnlinePoll();

        $poll->question = $request->question;
        $poll->yes_vote = 0;
        $poll->no_vote = 0;

        $poll->save();

        return redirect()->route('admin.poll')->with('success', 'Online poll is created successfully!!');
    }

    public function edit($id)
    {
        $poll = OnlinePoll::where('id', $id)->first();

        return view('admin.polls.edit', compact('poll'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'question'  =>   ['required'],
        ]);

        $poll = OnlinePoll::where('id', $id)->first();

        $poll->question = $request->question;
        $poll->yes_vote = 0;
        $poll->no_vote = 0;

        $poll->update();

        return redirect()->route('admin.poll')->with('success', 'Online poll is updated successfully!!');
    }

    public function delete($id)
    {
        $poll = OnlinePoll::where('id', $id)->first();

        $poll->delete();

        return redirect()->back()->with('success', 'Online poll is deleted successfully!!');
    }
}
