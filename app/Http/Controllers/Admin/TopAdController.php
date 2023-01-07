<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TopAdvertisement;
use Illuminate\Http\Request;

class TopAdController extends Controller
{
    public function top_ad()
    {
        $ad_data = TopAdvertisement::where('id', 1)->first();
        return view('admin.ad.top_ad', compact('ad_data'));
    }
    public function ad_submit(Request $request)
    {
        $ad_data = TopAdvertisement::where('id', 1)->first();

        if ($request->hasFile('top_ad')) {
            $request->validate([
                'top_ad'   =>  ['image', 'mimes:png,jpg,jpeg,gif'],
            ]);


            if ($ad_data->top_ad != '') {
                unlink(public_path('uploads/' . $ad_data->top_ad));
            }


            $ext = $request->file('top_ad')->extension();
            $final_name = 'top_ad' . '.' . $ext;

            $request->file('top_ad')->move(public_path('uploads/'), $final_name);

            $ad_data->top_ad = $final_name;
        }


        $ad_data->top_ad_url = $request->top_ad_url;
        $ad_data->top_ad_status = $request->top_ad_status;

        $ad_data->update();

        return redirect()->back()->with('success', 'Top ad Section updated successfully!!');
    }
}
