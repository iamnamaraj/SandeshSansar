<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        $about = Page::where('id', 1)->first();
        return view('admin.pages.about', compact('about'));
    }

    public function about_update(Request $request)
    {
        $request->validate([
            'about_title'   => ['required'],
            'about_detail'  =>  ['required'],

        ]);

        $about = Page::where('id', 1)->first();

        $about->about_title = $request->about_title;
        $about->about_detail = $request->about_detail;
        $about->about_status = $request->about_status;

        $about->update();

        return redirect()->back()->with('success', 'About page updated successfully!!');
    }

    public function faq()
    {
        $faq = Page::where('id', 1)->first();
        return view('admin.pages.faq', compact('faq'));
    }

    public function faq_update(Request $request)
    {
        $request->validate([
            'faq_title'   => ['required'],
            'faq_detail'  =>  ['required'],

        ]);

        $faq = Page::where('id', 1)->first();

        $faq->faq_title = $request->faq_title;
        $faq->faq_detail = $request->faq_detail;
        $faq->faq_status = $request->faq_status;

        $faq->update();

        return redirect()->back()->with('success', 'Faq page updated successfully!!');
    }

    public function terms()
    {
        $terms = Page::where('id', 1)->first();
        return view('admin.pages.terms', compact('terms'));
    }

    public function terms_update(Request $request)
    {
        $request->validate([
            'terms_title'   => ['required'],
            'terms_detail'  =>  ['required'],

        ]);

        $terms = Page::where('id', 1)->first();

        $terms->terms_title = $request->terms_title;
        $terms->terms_detail = $request->terms_detail;
        $terms->terms_status = $request->terms_status;

        $terms->update();

        return redirect()->back()->with('success', 'Terms & Conditions page updated successfully!!');
    }

    public function privacy()
    {
        $privacy = Page::where('id', 1)->first();
        return view('admin.pages.privacy', compact('privacy'));
    }

    public function privacy_update(Request $request)
    {
        $request->validate([
            'privacy_title'   => ['required'],
            'privacy_detail'  =>  ['required'],

        ]);

        $privacy = Page::where('id', 1)->first();

        $privacy->privacy_title = $request->privacy_title;
        $privacy->privacy_detail = $request->privacy_detail;
        $privacy->privacy_status = $request->privacy_status;

        $privacy->update();

        return redirect()->back()->with('success', 'privacy and Policy  page updated successfully!!');
    }


    public function disclaimer()
    {
        $disclaimer = Page::where('id', 1)->first();
        return view('admin.pages.disclaimer', compact('disclaimer'));
    }

    public function disclaimer_update(Request $request)
    {
        $request->validate([
            'disclaimer_title'   => ['required'],
            'disclaimer_detail'  =>  ['required'],

        ]);

        $disclaimer = Page::where('id', 1)->first();

        $disclaimer->disclaimer_title = $request->disclaimer_title;
        $disclaimer->disclaimer_detail = $request->disclaimer_detail;
        $disclaimer->disclaimer_status = $request->disclaimer_status;

        $disclaimer->update();

        return redirect()->back()->with('success', 'Disclaimer page updated successfully!!');
    }

    public function login()
    {
        $login = Page::where('id', 1)->first();
        return view('admin.pages.login', compact('login'));
    }

    public function login_update(Request $request)
    {
        $request->validate([
            'login_title'   => ['required'],

        ]);

        $login = Page::where('id', 1)->first();

        $login->login_title = $request->login_title;
        $login->login_status = $request->login_status;

        $login->update();

        return redirect()->back()->with('success', 'Login page updated successfully!!');
    }

    public function contact()
    {
        $contact = Page::where('id', 1)->first();
        return view('admin.pages.contact', compact('contact'));
    }

    public function contact_update(Request $request)
    {
        $request->validate([
            'contact_title'   => ['required'],


        ]);

        $contact = Page::where('id', 1)->first();

        $contact->contact_title = $request->contact_title;
        $contact->contact_detail = $request->contact_detail;
        $contact->contact_map = $request->contact_map;
        $contact->contact_status = $request->contact_status;

        $contact->update();

        return redirect()->back()->with('success', 'Contact page updated successfully!!');
    }
}
