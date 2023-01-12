<?php

namespace App\Http\Controllers\Front;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqController extends Controller
{
    public function index()
    {
        $faq  = Page::where('id', 1)->first();
        return view('front.faq', compact('faq'));
    }
}
