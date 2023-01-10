<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\HomeAdvertisement;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $posts = Post::orderBy('id', 'desc')->get();
        $settings = Setting::where('id', 1)->first();
        $home_ad = HomeAdvertisement::where('id', 1)->first();
        return view('front.home', compact('home_ad', 'settings', 'posts'));
    }
}
