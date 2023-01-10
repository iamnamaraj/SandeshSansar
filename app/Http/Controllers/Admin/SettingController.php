<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $news_ticker = Setting::where('id', 1)->first();
        return view('admin.settings.index', compact('news_ticker'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'news_ticker_status'    =>  ['required', 'integer'],
            'news_ticker_total'     =>  ['required', 'integer'],
        ]);

        $settings = Setting::where('id', 1)->first();
        $settings->news_ticker_status  = $request->news_ticker_status;
        $settings->news_ticker_total  = $request->news_ticker_total;

        $settings->update();

        return redirect()->back()->with('success', 'Settings data updated successfully!!');
    }
}
