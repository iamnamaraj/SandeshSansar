<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\OnlinePoll;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function submit(Request $request)
    {
        $poll_data = OnlinePoll::where('id', $request->id)->first();

        if ($request->vote == 'Yes') {

            $updated_yes = $poll_data->yes_vote + 1;
            $poll_data->yes_vote = $updated_yes;
        } else {

            $updated_no = $poll_data->no_vote + 1;
            $poll_data->no_vote = $updated_no;
        }

        $poll_data->update();

        session()->put('current_poll_id', $poll_data->id);

        return redirect()->back()->with('success', 'Thank you for your opinion.Your vote is counted successfully!!');
    }

    public function previous()
    {
        $poll_data = OnlinePoll::orderBy('id', 'desc')->get();
        return view('front.previous', compact('poll_data'));
    }
}
