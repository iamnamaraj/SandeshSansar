<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\HomeAdvertisement;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $home_ad = HomeAdvertisement::where('id', 1)->first();
        return view('front.home', compact('home_ad'));
    }
}
