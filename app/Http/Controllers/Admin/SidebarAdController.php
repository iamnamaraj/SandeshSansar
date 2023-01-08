<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SidebarAd;
use Illuminate\Http\Request;

class SidebarAdController extends Controller
{
    public function index()
    {
        $ad_data = SidebarAd::get();
        return view('admin.ad.sidebar_ad.index', compact('ad_data'));
    }

    public function create()
    {
        return view('admin.ad.sidebar_ad.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'sidebar_ad'    =>  ['required', 'image', 'mimes:png,jpg,jpeg,gif']

        ], [
            'sidebar_ad.required'   =>  'photo must be selected for ads',
            'sidebar_ad.image'      =>  'photo must be an image',
            'sidebar_ad.mimes'      =>  'Correct mimes neeeded',

        ]);

        $ext = $request->file('sidebar_ad')->extension();
        $final_name = 'sidebar_ad_' . time() . '.' . $ext;
        $request->file('sidebar_ad')->move(public_path('uploads/'), $final_name);

        $ad_data = new SidebarAd();

        $ad_data->sidebar_ad = $final_name;
        $ad_data->sidebar_ad_url = $request->sidebar_ad_url;
        $ad_data->sidebar_ad_location = $request->sidebar_ad_location;

        $ad_data->save();

        return redirect()->back()->with('success', 'Sidebar Advertisement created successfully!');
    }

    public function edit($id)
    {
        $ad_data = SidebarAd::where('id', $id)->first();

        return view('admin.ad.sidebar_ad.edit', compact('ad_data'));
    }

    public function update(Request $request, $id)
    {
        $ad_data = SidebarAd::where('id', $id)->first();

        if ($request->hasFile('sidebar_ad')) {
            $request->validate([
                'sidebar_ad'    =>  ['image', 'mimes:png,jpg,jpeg,gif']

            ], [
                'sidebar_ad.required'   =>  'photo must be selected for ads',
                'sidebar_ad.image'      =>  'photo must be an image',
                'sidebar_ad.mimes'      =>  'Correct mimes neeeded',

            ]);

            if ($ad_data->sidebar_ad != '') {
                unlink(public_path('uploads/' . $ad_data->sidebar_ad));
            }

            $ext = $request->file('sidebar_ad')->extension();
            $final_name = 'sidebar_ad' . time() . '.' . $ext;

            $request->file('sidebar_ad')->move(public_path('uploads/'), $final_name);

            $ad_data->sidebar_ad = $final_name;
        }


        $ad_data->sidebar_ad_url = $request->sidebar_ad_url;
        $ad_data->sidebar_ad_location = $request->sidebar_ad_location;

        $ad_data->update();

        return redirect()->route('admin.sidebar-ad')->with('success', 'Sidebar advertisement is updated succeddfully!!');
    }

    public function delete($id)
    {
        $ad_data = SidebarAd::where('id', $id)->first();

        unlink(public_path('uploads/' . $ad_data->sidebar_ad));

        $ad_data->delete();

        return redirect()->back()->with('success', 'Sidebar advertisement is deleted successfully!!');
    }
}
