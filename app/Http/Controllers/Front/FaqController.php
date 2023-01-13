<?php

namespace App\Http\Controllers\Front;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Faq;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::get();
        $faq  = Page::where('id', 1)->first();
        return view('front.faq', compact('faq', 'faqs'));
    }
}
