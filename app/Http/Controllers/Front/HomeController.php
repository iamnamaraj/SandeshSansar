<?php

namespace App\Http\Controllers\Front;

use App\Models\Post;
use App\Models\Admin;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\HomeAdvertisement;
use App\Http\Controllers\Controller;
use App\Models\SubCategory;

class HomeController extends Controller
{
    public function home()
    {
        $sub_categories = SubCategory::with('rPOst')->orderBy('order', 'asc')->where('show_on_home', 'SHow')->get();
        $posts = Post::with('rSubCategory')->orderBy('id', 'desc')->get();
        $settings = Setting::where('id', 1)->first();
        $home_ad = HomeAdvertisement::where('id', 1)->first();

        return view('front.home', compact('home_ad', 'settings', 'posts', 'sub_categories'));
    }
}
