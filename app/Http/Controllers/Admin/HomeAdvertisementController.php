<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeAdvertisement;
use Illuminate\Http\Request;

class HomeAdvertisementController extends Controller
{
    public function home_ad()
    {
        $data = HomeAdvertisement::where('id', 1)->first();
        return view('admin.ad.home_ad', compact('data'));
    }

    public function ad_submit(Request $request)
    {
        $ad_data = HomeAdvertisement::where('id', 1)->first();

        if ($request->hasFile('above_search_ad')) {
            $request->validate([
                'above_search_ad'   =>  ['image', 'mimes:png,jpg,jpeg,gif'],
            ]);

            if ($ad_data->above_search_ad != '') {
                unlink(public_path('uploads/' . $ad_data->above_search_ad));
            }

            $ext = $request->file('above_search_ad')->extension();
            $final_name = 'above_search_ad' . '.' . $ext;

            $request->file('above_search_ad')->move(public_path('uploads/'), $final_name);

            $ad_data->above_search_ad = $final_name;
        }


        if ($request->hasFile('above_footer_ad')) {
            $request->validate([
                'above_footer_ad'   =>  ['image', 'mimes:png,jpg,jpeg,gif'],
            ]);

            if ($ad_data->above_footer_ad != '') {
                unlink(public_path('uploads/' . $ad_data->above_footer_ad));
            }

            $ext = $request->file('above_footer_ad')->extension();
            $final_name = 'above_footer_ad' . '.' . $ext;

            $request->file('above_footer_ad')->move(public_path('uploads/'), $final_name);

            $ad_data->above_footer_ad = $final_name;
        }



        $ad_data->above_search_ad_url = $request->above_search_ad_url;
        $ad_data->above_search_ad_status = $request->above_search_ad_status;
        $ad_data->above_footer_ad_url = $request->above_footer_ad_url;
        $ad_data->above_footer_ad_status = $request->above_footer_ad_status;

        $ad_data->update();

        return redirect()->back()->with('success', 'Home ad Section updated successfully!!');
    }
}
